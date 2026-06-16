<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $query = Producto::with('categoria');

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($sub) use ($q) {
                $sub->where('nombre',  'LIKE', "%{$q}%")
                    ->orWhere('marca',   'LIKE', "%{$q}%")
                    ->orWhere('consola', 'LIKE', "%{$q}%");
            });
        }

        if ($request->filled('categoria')) {
            $query->where('id_categoria', $request->categoria);
        }

        if ($request->filled('condicion')) {
            $query->where('condicion', $request->condicion);
        }

        if ($request->filled('activo')) {
            $query->where('activo', $request->activo);
        }

        switch ($request->get('orden', 'reciente')) {
            case 'nombre':      $query->orderBy('nombre', 'asc'); break;
            case 'precio_asc':  $query->orderBy('precio', 'asc'); break;
            case 'precio_desc': $query->orderBy('precio', 'desc'); break;
            case 'stock':       $query->orderBy('stock', 'asc'); break;
            default:            $query->latest(); break;
        }

        $productos = $query->paginate(15)->withQueryString();

        $totalProductos = Producto::count();
        $totalActivos   = Producto::where('activo', 1)->count();
        $stockBajo      = Producto::whereColumn('stock', '<=', 'stock_bajo')->where('stock', '>', 0)->count();
        $sinStock       = Producto::where('stock', 0)->count();
        $categorias     = \App\Models\Categoria::orderBy('nombre')->get();

        return view('dashboard-productos-ver', compact(
            'productos', 'totalProductos', 'totalActivos', 'stockBajo', 'sinStock', 'categorias'
        ));
    }

    public function create()
    {
        $categorias = \App\Models\Categoria::orderBy('nombre')->get();
        return view('dashboard-productos-añadir', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'               => 'required|string|max:150',
            'descripcion'          => 'required|string|min:20',
            'marca'                => 'required|string|max:255',
            'consola'              => 'required|string|max:255',
            'id_categoria'         => 'required|exists:categorias,id',
            'tipo_producto'        => 'required|in:videojuego,consola,periferico',
            'condicion'            => 'required|in:nuevo,usado,reacondicionado',
            'precio_original'      => 'required|numeric|min:0',
            'porcentaje_descuento' => 'nullable|numeric|min:0|max:100',
            'precio'               => 'required|numeric|min:0',
            'stock'                => 'required|integer|min:0',
            'stock_bajo'           => 'required|integer|min:0',
            'url_imagen' => ['nullable','url',
                    'max:255',
                    'regex:/\.(jpg|jpeg|png|gif|webp|svg)(\?.*)?$/i'
                ],
            'imagen'               => 'nullable|image|max:2048',
            'activo'               => 'nullable|boolean',
        ]);

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('productos', 'public');
            $validated['url_imagen'] = asset('storage/' . $path);
        }

        // Validar que tenga al menos una imagen
        if (empty($validated['url_imagen'])) {
            return back()
                ->withErrors(['imagen' => 'El producto debe tener una imagen. Subí un archivo o ingresá una URL.'])
                ->withInput();
        }

        $validated['activo']               = $request->has('activo') ? 1 : 0;
        $validated['porcentaje_descuento'] = $validated['porcentaje_descuento'] ?? 0;

        Producto::create($validated);

        return redirect()->route('admin.productos.index')
                         ->with('success', 'Producto creado correctamente.');
    }

    public function show(Producto $producto)
    {
        $producto->load('categoria');
        return view('dashboard-productos-detalles', compact('producto'));
    }

    public function showPublico(Producto $producto)
    {
        $producto->load('categoria');
        return view('producto-detalle', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $categorias = \App\Models\Categoria::orderBy('nombre')->get();
        return view('dashboard-producto-editar', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'nombre'               => 'required|string|max:150',
            'descripcion'          => 'nullable|string',
            'marca'                => 'required|string|max:255',
            'consola'              => 'required|string|max:255',
            'id_categoria'         => 'required|exists:categorias,id',
            'tipo_producto'        => 'required|in:videojuego,consola,periferico',
            'condicion'            => 'required|in:nuevo,usado,reacondicionado',
            'precio_original'      => 'required|numeric|min:0',
            'porcentaje_descuento' => 'nullable|numeric|min:0|max:100',
            'precio'               => 'required|numeric|min:0',
            'stock'                => 'required|integer|min:0',
            'stock_bajo'           => 'required|integer|min:0',
            'url_imagen'           => 'nullable|url|max:255',
            'imagen'               => 'nullable|image|max:2048',
            'activo'               => 'nullable|boolean',
        ]);

        // Si sube archivo, procesarlo primero
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('productos', 'public');
            $validated['url_imagen'] = asset('storage/' . $path);
        }

        // Determinar la imagen final: nueva subida, nueva URL, o la que ya tenía
        $imagenFinal = $validated['url_imagen'] ?? $producto->url_imagen;

        // Validar que quede al menos una imagen
        if (empty($imagenFinal)) {
            return back()
                ->withErrors(['imagen' => 'El producto debe tener una imagen. Subí un archivo o ingresá una URL.'])
                ->withInput();
        }

        $validated['url_imagen']           = $imagenFinal;
        $validated['activo']               = $request->boolean('activo');
        $validated['porcentaje_descuento'] = $validated['porcentaje_descuento'] ?? 0;

        $producto->update($validated);

        return redirect()->route('admin.productos.show', $producto->id)
                         ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('admin.productos.index')
                         ->with('success', 'Producto eliminado correctamente.');
    }
}       