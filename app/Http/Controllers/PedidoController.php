<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\VentaCabecera;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(Request $request)
    {
        $query = VentaCabecera::with(['usuario', 'detalles.producto'])
                    ->where('estado', '!=', 'carrito')
                    ->latest();

        if ($request->has('estado') && $request->estado !== '') {
            $query->where('estado', $request->estado);
        }

        $ordenes = $query->paginate(15);
        return view('dashboard-pedidos', compact('ordenes'));
    }

    public function show($id)
    {
        $orden = VentaCabecera::with(['usuario', 'detalles.producto'])->findOrFail($id);
        return view('dashboard-pedidos-detalle', compact('orden'));
    }

    public function updateEstado(Request $request, $id)
    {
        $orden = VentaCabecera::findOrFail($id);

        $request->validate([
            'estado' => 'required|in:pendiente,pagado,enviado,entregado,cancelado,confirmado'
        ]);

        $orden->update(['estado' => $request->estado]);

        return back()->with('success', 'Estado actualizado correctamente.');
    }
}