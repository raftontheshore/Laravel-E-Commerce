<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function index()
    {
        // Traemos todas las ventas del usuario, excluyendo las que siguen en el carrito
        $compras = VentaCabecera::with('detalles.producto')
            ->where('user_id', Auth::id())
            ->where('estado', '!=', 'carrito')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('mis-compras', compact('compras'));
    }
}