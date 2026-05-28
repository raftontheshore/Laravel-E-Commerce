<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;
use App\Models\VentaDetalle;
use App\Models\Producto;

class CarritoController extends Controller
{
    // Busca el carrito activo o crea uno nuevo vacío
    private function obtenerCarrito()
    {
    return VentaCabecera::firstOrCreate(
    [
    'user_id' => auth()->id(),
    'estado' => 'carrito',
    ],
    // Si crea uno nuevo, arranca con total 0
    ['total' => 0]
    );
    }

    //index() — ver el carrito
    public function index()
    {
        $carrito = $this->obtenerCarrito();
        // with('producto') evita N+1: una sola consulta para todos los productos
        $items = $carrito->detalles()->with('producto')->get();
        return view('carrito', compact('carrito', 'items'));
    }

    //agregar() — agregar producto
    public function agregar(Request $request)
    {
        $request->validate([
        'producto_id' => 'required|exists:productos,id',
        'cantidad' => 'required|integer|min:1',
        ]);
        $producto = Producto::findOrFail($request->producto_id);
        // Verificar stock antes de agregar
        if ($producto->stock < $request->cantidad) {
        return back()->with('error', 'No hay suficiente stock');
        }
        $carrito = $this->obtenerCarrito();
        // ¿El producto ya está en el carrito?
        $item = $carrito->detalles()
        ->where('producto_id', $producto->id)->first();
        if ($item) {
        // Si ya existe: suma la cantidad
        $item->cantidad += $request->cantidad;
        $item->subtotal = $item->cantidad * $item->precio_unitario;
        $item->save();
        } else {
        // Si no existe: crea un nuevo ítem
        $carrito->detalles()->create([
        'producto_id' => $producto->id,
        'cantidad' => $request->cantidad,
        'precio_unitario' => $producto->precio,
        'subtotal' => $producto->precio * $request->cantidad,
        ]);
        }
        $this->recalcularTotal($carrito);
        return back()->with('success', 'Producto agregado al carrito');
    }


    //eliminar() — quitar producto
    public function eliminar($id)
    {
        $carrito = $this->obtenerCarrito();
        // where('id',$id) evita eliminar ítems de otro carrito
        $carrito->detalles()->where('id', $id)->delete();
        $this->recalcularTotal($carrito);
        return back()->with('success', 'Producto eliminado');}

    
    //confirmar() — cerrar la compra
    /**
    *¿Por qué fecha_venta va en confirmar() y no en agregar()? El carrito se CREA
    *cuando el cliente agrega el primer producto. La fecha_venta debe registrarse cuando se
    *CONFIRMA la compra. Son dos momentos distintos del flujo.
     */
    public function confirmar()
    {
        $carrito = $this->obtenerCarrito();
        if ($carrito->detalles()->count() === 0) {
        return back()->with('error', 'Tu carrito está vacío');
        }
        $items = $carrito->detalles()->with('producto')->get();
        $total = $carrito->total;
        // Cambia estado y guarda fecha exacta de la compra
        $carrito->update([
        'estado' => 'confirmado',
        'fecha_venta' => now(),
        ]);
        // Pasa los datos por sesión a la vista de confirmación
        return redirect()->route('compra.confirmada')
        ->with('items', $items)
        ->with('total', $total);
    }

    //recalcularTotal() — helper privado
    private function recalcularTotal(VentaCabecera $carrito)
    {
        // sum() suma todos los subtotales de los ítems del carrito
        $total = $carrito->detalles()->sum('subtotal');
        $carrito->update(['total' => $total]);
    }

}
