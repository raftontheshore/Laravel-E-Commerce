<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::latest()->get();
        return view('dashboard-categorias-añadir', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|max:150|unique:categorias,nombre',
            'descripcion' => 'nullable',
        ]);

        Categoria::create([
            'nombre'      => $request->nombre,
            'descripcion' => $request->descripcion,
            'activo'      => $request->boolean('activo'),
        ]);

        return redirect()->route('admin.categorias.index')
                         ->with('success', 'Categoría creada correctamente.');
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre'      => 'required|max:150|unique:categorias,nombre,' . $categoria->id,
            'descripcion' => 'nullable',
        ]);

        $categoria->update([
            'nombre'      => $request->nombre,
            'descripcion' => $request->descripcion,
            'activo'      => $request->boolean('activo'),
        ]);

        return redirect()->route('admin.categorias.index')
                         ->with('success', 'Categoría actualizada.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('admin.categorias.index')
                         ->with('success', 'Categoría eliminada.');
    }
}