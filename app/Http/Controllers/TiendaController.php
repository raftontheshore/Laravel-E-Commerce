<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index(Request $request, $categoria = 'todos')
    {
        $query = Producto::where('activo', 1)->with('categoria');

        if ($categoria !== 'todos') {
            $query->where('tipo_producto', $categoria);
        }

        if ($request->filled('q')) {
            $query->where('nombre', 'like', '%' . $request->q . '%');
        }

        if ($request->filled('condicion')) {
            $query->where('condicion', $request->condicion);
        }

        if ($request->filled('consola')) {
            $query->where('consola', $request->consola);
        }

        if ($request->filled('genero') && in_array($categoria, ['todos', 'videojuego'])) {
    $query->where('id_categoria', $request->genero);
}

        if ($request->filled('precio_min')) {
            $query->where('precio', '>=', $request->precio_min);
        }
        if ($request->filled('precio_max')) {
            $query->where('precio', '<=', $request->precio_max);
        }

        match($request->orden) {
            'precio_asc'  => $query->orderBy('precio', 'asc'),
            'precio_desc' => $query->orderBy('precio', 'desc'),
            default       => $query->latest(),
        };

        $productos = $query->paginate(15)->withQueryString();

        return view('tienda', compact('productos', 'categoria'));
    }
}