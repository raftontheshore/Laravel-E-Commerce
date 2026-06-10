<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VentaCabecera;

class CheckoutController extends Controller
{
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

    public function store(Request $request)
    {
        $request->validate([
            'direccion' => [
                'required', 'string', 'min:10', 'max:150',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜñÑ0-9\s.,#°\-\/()\[\]]+$/',
                'not_regex:/^\d+$/',
            ],
            'telefono' => [
                'required', 'string', 'max:20',
                'regex:/^\+?[\d\s\-()]{7,20}$/',
            ],
            'codigo_postal' => [
                'nullable', 'string', 'max:8',
                'regex:/^([A-Z]?\d{4}[A-Z]{0,3})?$/',
            ],
            'notas' => ['nullable', 'string', 'max:500'],
        ], [
            'direccion.required'  => 'La dirección de envío es obligatoria.',
            'direccion.min'       => 'La dirección debe tener al menos 10 caracteres.',
            'direccion.regex'     => 'La dirección contiene caracteres no permitidos.',
            'direccion.not_regex' => 'La dirección debe incluir el nombre de la calle, no solo números.',
            'telefono.required'   => 'El teléfono de contacto es obligatorio.',
            'telefono.regex'      => 'El teléfono debe contener solo números, espacios o guiones.',
            'codigo_postal.regex' => 'Código postal inválido. Usá formato 3400 o CPA como A4400XXX.',
            'notas.max'           => 'Las notas no pueden superar los 500 caracteres.',
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
            'direccion'     => trim($request->direccion),
            'telefono'      => trim($request->telefono),
            'codigo_postal' => $request->filled('codigo_postal') ? strtoupper(trim($request->codigo_postal)) : null,
            'notas'         => $request->filled('notas') ? strip_tags($request->notas) : null,
            'estado'        => 'pendiente',
        ]);

        return redirect()->route('checkout.confirmacion', $venta->id)
            ->with('success', '¡Compra confirmada!');
    }

    public function confirmacion($id)
    {
        $venta = VentaCabecera::with('detalles.producto')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('carrito-checkout-confirmacion', compact('venta'));
    }
}