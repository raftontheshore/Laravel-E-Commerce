<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;
use App\Models\VentaDetalle;
use App\Models\Producto;

class CarritoController extends Controller
{
    // ── Helper: obtener o crear el carrito activo del usuario ──
    private function obtenerCarrito(): VentaCabecera
    {
        return VentaCabecera::firstOrCreate(
            [
                'user_id' => auth()->id(),
                'estado'  => 'carrito',
            ],
            ['total' => 0]
        );
    }

    // ── Ver carrito ────────────────────────────────────────────
    public function index()
    {
        $carrito = $this->obtenerCarrito();
        $items   = $carrito->detalles()->with('producto')->get();

        return view('carrito', compact('carrito', 'items'));
    }

    // ── Agregar producto ───────────────────────────────────────
    public function agregar(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad'    => 'required|integer|min:1',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        // Sin stock en absoluto
        if ($producto->stock <= 0) {
            return back()->with('error', 'Este producto no tiene stock disponible.');
        }

        $carrito = $this->obtenerCarrito();

        // ¿Ya está en el carrito?
        $item = $carrito->detalles()
                        ->where('producto_id', $producto->id)
                        ->first();

        $cantidadActual = $item ? $item->cantidad : 0;
        $cantidadNueva  = $cantidadActual + $request->cantidad;

        // Validar que la cantidad total no supere el stock real
        if ($cantidadNueva > $producto->stock) {
            $disponible = $producto->stock - $cantidadActual;

            if ($disponible <= 0) {
                return back()->with('error',
                    "Ya tenés las {$producto->stock} unidades disponibles en tu carrito."
                );
            }

            return back()->with('error',
                "Solo podés agregar {$disponible} unidad(es) más " .
                "(stock disponible: {$producto->stock}, ya tenés {$cantidadActual} en el carrito)."
            );
        }

        if ($item) {
            // Actualizar ítem existente
            $item->cantidad  = $cantidadNueva;
            $item->subtotal  = $cantidadNueva * $item->precio_unitario;
            $item->save();
        } else {
            // Crear nuevo ítem
            $carrito->detalles()->create([
                'producto_id'    => $producto->id,
                'cantidad'       => $request->cantidad,
                'precio_unitario'=> $producto->precio,
                'subtotal'       => $producto->precio * $request->cantidad,
            ]);
        }

        $this->recalcularTotal($carrito);

        return back()->with('success', '✓ Producto agregado al carrito.');
    }

    // ── Eliminar ítem ──────────────────────────────────────────
    public function eliminar($id)
    {
        $carrito = $this->obtenerCarrito();

        $carrito->detalles()->where('id', $id)->delete();

        $this->recalcularTotal($carrito);

        return back()->with('success', 'Producto eliminado del carrito.');
    }

    // ── Confirmar compra ───────────────────────────────────────
    public function confirmar()
    {
        $carrito = $this->obtenerCarrito();

        if ($carrito->detalles()->count() === 0) {
            return back()->with('error', 'Tu carrito está vacío.');
        }

        $items = $carrito->detalles()->with('producto')->get();

        // Validar stock de TODOS los ítems antes de confirmar
        foreach ($items as $item) {
            if ($item->producto->stock < $item->cantidad) {
                return back()->with('error',
                    "Stock insuficiente para \"{$item->producto->nombre}\". " .
                    "Disponible: {$item->producto->stock}, en tu carrito: {$item->cantidad}."
                );
            }
        }

        // Descontar stock de cada producto
        foreach ($items as $item) {
            $item->producto->decrement('stock', $item->cantidad);
        }

        $total = $carrito->total;

        // Cerrar el carrito → venta confirmada
        $carrito->update([
            'estado'      => 'confirmado',
            'fecha_venta' => now(),
        ]);

        return redirect()->route('compra.confirmada')
            ->with('items', $items)
            ->with('total', $total);
    }

    // ── Helper: recalcular total ───────────────────────────────
    private function recalcularTotal(VentaCabecera $carrito): void
    {
        $total = $carrito->detalles()->sum('subtotal');
        $carrito->update(['total' => $total]);
    }
}