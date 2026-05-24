<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
   public function index()
{
    $productos = Producto::latest()->paginate(15);
    $categorias = \App\Models\Categoria::orderBy('nombre')->get(); // ← agregá esta línea
    return view('dashboard-productos-añadir', compact('productos', 'categorias')); // ← y esta
}

    public function create()
    {
        $categorias = \App\Models\Categoria::orderBy('nombre')->get();
        return view('crear-producto', compact('categorias'));
    }

    public function store(Request $request)
    {
        // lo armamos después
    }
}