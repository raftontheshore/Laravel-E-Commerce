<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VentaCabecera;

class CheckoutController extends Controller
{
    /**
     * Muestra el formulario de datos de entrega.
     * Busca la venta pendiente activa del usuario (el carrito).
     */
    public function index()
    {
        $usuario = Auth::user();

        $venta = VentaCabecera::with('detalles.producto')
            ->where('user_id', $usuario->id)
            ->where('estado', 'carrito')
            ->latest()
            ->first();

        if (!$venta || $venta->detalles->isEmpty()) {
            return redirect()->route('carrito.index')
                ->with('error', 'Tu carrito está vacío.');
        }

        return view('carrito-checkout', compact('venta'));
    }

    /**
     * Guarda los datos de entrega en la venta y cambia el estado a confirmado.
     */
    public function store(Request $request)
    {
        $request->validate([
            'direccion'     => 'required|string|max:255',
            'telefono'      => 'required|string|max:20',
            'codigo_postal' => 'nullable|string|max:10',
            'notas'         => 'nullable|string|max:500',
        ], [
            'direccion.required' => 'La dirección de envío es obligatoria.',
            'telefono.required'  => 'El teléfono de contacto es obligatorio.',
        ]);

        $usuario = Auth::user();

        $venta = VentaCabecera::with('detalles.producto')
            ->where('user_id', $usuario->id)
            ->where('estado', 'carrito')
            ->latest()
            ->first();

        if (!$venta) {
            return redirect()->route('carrito.index')
                ->with('error', 'No se encontró un carrito activo.');
        }

        $venta->update([
            'direccion'     => $request->direccion,
            'telefono'      => $request->telefono,
            'codigo_postal' => $request->codigo_postal,
            'notas'         => $request->notas,
            'estado'        => 'confirmado', // cambiá al estado que uses para "pagado/en proceso"
        ]);

        return redirect()->route('checkout.confirmacion', $venta->id)
            ->with('success', '¡Compra confirmada!');
    }

    /**
     * Página de confirmación final (la haremos en la próxima etapa).
     */
    public function confirmacion($id)
    {
        $venta = VentaCabecera::with('detalles.producto')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('carrito-checkout-confirmacion', compact('venta'));
    }
}