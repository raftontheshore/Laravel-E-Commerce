<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Orden;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(Request $request)
    {

        $query = Orden::with(['usuario', 'items.producto'])->latest();


        if ($request->has('estado')) {
            $query->where('estado', $request->estado);
        }

        $ordenes = $query->paginate(15);

        return view('dashboard-pedidos', compact('ordenes'));
    }

    public function show(Orden $orden)
    {
        $orden->load(['usuario', 'items.producto']);
        return view('dashboard-pedidos-detalle', compact('orden'));
    }

    public function updateEstado(Request $request, Orden $orden)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,pagado,enviado,entregado,cancelado'
        ]);

        $orden->update(['estado' => $request->estado]);

        return back()->with('success', 'Estado actualizado correctamente.');
    }
}