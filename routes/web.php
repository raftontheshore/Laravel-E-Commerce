<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\MensajeController;

Route::get('/contacto',  [ContactoController::class, 'index']);
Route::post('/contacto', [ContactoController::class, 'store']);


// ============================================================
// RUTA: Página de inicio (/)
// ============================================================
Route::get('/', function () {
    $coleccion = collect(obtenerProductos());
    $productos_destacados = $coleccion->take(4);
    $consolas = $coleccion->filter(function ($item) {
        return strtolower($item->categoria) === 'consola';
    });
    return view('welcome', compact('productos_destacados', 'consolas'));
});

// ============================================================
// RUTAS: Breeze (auth)
// ============================================================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ── Usuarios ──────────────────────────────────────────
    Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios');
    Route::patch('/admin/usuarios/{user}/rol', [UsuarioController::class, 'toggleRol'])->name('admin.usuarios.rol');
    Route::delete('/admin/usuarios/{user}', [UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy');

    // ── Productos ─────────────────────────────────────────
    // Una sola definición limpia, con la ruta 'crear' explícita
    // para que no colisione con /{producto} del resource.
    Route::get('/admin/productos',                    [ProductoController::class, 'index'])->name('admin.productos.index');
    Route::get('/admin/productos/crear',              [ProductoController::class, 'create'])->name('admin.productos.create');
    Route::post('/admin/productos',                   [ProductoController::class, 'store'])->name('admin.productos.store');
    Route::get('/admin/productos/{producto}',         [ProductoController::class, 'show'])->name('admin.productos.show');
    Route::get('/admin/productos/{producto}/editar',  [ProductoController::class, 'edit'])->name('admin.productos.edit');
    Route::patch('/admin/productos/{producto}',       [ProductoController::class, 'update'])->name('admin.productos.update');
    Route::delete('/admin/productos/{producto}',      [ProductoController::class, 'destroy'])->name('admin.productos.destroy');

    // ── Categorías ────────────────────────────────────────
    Route::get('/admin/categorias',                   [CategoriaController::class, 'index'])->name('admin.categorias.index');
    Route::post('/admin/categorias',                  [CategoriaController::class, 'store'])->name('admin.categorias.store');
    Route::patch('/admin/categorias/{categoria}',     [CategoriaController::class, 'update'])->name('admin.categorias.update');
    Route::delete('/admin/categorias/{categoria}',    [CategoriaController::class, 'destroy'])->name('admin.categorias.destroy');

    // ── Carrito ─────────────────────────────────────────── 
    Route::middleware('rol:cliente')->group(function () {
        Route::get('/carrito', [CarritoController::class, 'index'])->name('cliente.carrito');
        Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
        Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
        Route::post('/carrito/confirmar', [CarritoController::class, 'confirmar'])->name('carrito.confirmar');
    });

    // ── Compra confirmada ───────────────────────────────── 
    Route::get('/compra-confirmada', function () {
        if (!session('total')) {
            return redirect()->route('/');
        }
        return view('backend.usuarios.compra-confirmada');
    })->name('compra.confirmada');

    // ── Mensajes (consultas + contactos) ─────────────────────
    Route::get('/dashboard/mensajes', [MensajeController::class, 'index'])
        ->name('dashboard.mensajes');

    Route::patch('/dashboard/mensajes/consulta/{id}', [MensajeController::class, 'updateConsulta'])
        ->name('dashboard.mensajes.consulta.update');

    Route::patch('/dashboard/mensajes/contacto/{id}', [MensajeController::class, 'updateContacto'])
        ->name('dashboard.mensajes.contacto.update');

    Route::delete('/dashboard/mensajes/consulta/{id}', [MensajeController::class, 'destroyConsulta'])
        ->name('dashboard.mensajes.consulta.destroy');

    Route::delete('/dashboard/mensajes/contacto/{id}', [MensajeController::class, 'destroyContacto'])
        ->name('dashboard.mensajes.contacto.destroy');

});

require __DIR__.'/auth.php';

// ============================================================
// RUTAS: Páginas estáticas
// ============================================================
Route::get('/sobre-mi', function () { return view('sobre-mi'); });
Route::get('/footer', function () { return view('footer'); });
Route::get('/juegos', function () { return view('juegos'); });
Route::get('/consolas', function () { return view('consolas'); });
Route::get('/nosotros', function () { return view('nosotros'); });
Route::get('/terminos', function () { return view('terminos'); });
Route::get('/privacidad', function () { return view('privacidad'); });
Route::get('/construccion', function () { return view('construccion'); });
Route::get('/faq', function () { return view('faq'); });

Route::get('/explorar', function () {
    $coleccion = collect(obtenerProductos());
    $nuevos_productos = $coleccion->filter(fn($item) => strtolower($item->estado) === 'nuevo');
    $ofertas_juegos   = $coleccion->filter(fn($item) => strtolower($item->categoria) === 'juego' && $item->porcentaje_descuento > 0);
    $combos           = $coleccion->filter(fn($item) => strtolower($item->categoria) === 'combo');
    return view('explorar', compact('nuevos_productos', 'ofertas_juegos', 'combos'));
});

// ============================================================
// RUTA: Tienda con filtro por categoría (/tienda/{categoria?})
// ============================================================
Route::get('/tienda/{categoria?}', function ($categoria = 'consola') {
    $coleccion = collect(obtenerProductos());
    $productos = $categoria === 'todos'
        ? $coleccion
        : $coleccion->filter(fn($item) => strtolower($item->categoria) === strtolower($categoria));
    return view('tienda', compact('productos', 'categoria'));
});

// ============================================================
// BASE DE DATOS TEMPORAL
// ============================================================
function obtenerProductos() {
    return [
        // --- JUEGOS ---
        (object) [
            'categoria' => 'Juego',
            'titulo' => 'Silent Hill 3',
            'precio_original' => 45000,
            'precio' => 38250,
            'porcentaje_descuento' => 15,
            'imagen_url' => 'https://i.3djuegos.com/juegos/5184/silent_hill_3/fotos/ficha/silent_hill_3-1697794.webp',
            'consola' => 'PS2',
            'estado' => 'Usado',
        ],
        (object) [
            'categoria' => 'Juego',
            'titulo' => 'Shin Megami Tensei Persona 3',
            'precio_original' => 60000,
            'precio' => 48000,
            'porcentaje_descuento' => 20,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/en/4/47/Persona3cover.jpg',
            'consola' => 'PS2',
            'estado' => 'Nuevo',
        ],
        (object) [
            'categoria' => 'Juego',
            'titulo' => 'LSD Dream Emulator',
            'precio_original' => 35000,
            'precio' => 35000,
            'porcentaje_descuento' => 0,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/en/a/a9/LSD_Coverart.png',
            'consola' => 'PS1',
            'estado' => 'Usado',
        ],
        (object) [
            'categoria' => 'Juego',
            'titulo' => 'Silent Hill 2',
            'precio_original' => 85000,
            'precio' => 85000,
            'porcentaje_descuento' => 0,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/en/9/95/Silent_Hill_2.jpg',
            'consola' => 'PS2',
            'estado' => 'Reacondicionado',
        ],
        (object) [
            'categoria' => 'Juego',
            'titulo' => 'Metal Gear Solid PS1',
            'precio_original' => 42000,
            'precio' => 29400,
            'porcentaje_descuento' => 30,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/en/3/33/Metal_Gear_Solid_cover_art.png',
            'consola' => 'PS1',
            'estado' => 'Usado',
        ],

        // --- CONSOLAS ---
        (object) [
            'categoria' => 'Consola',
            'titulo' => 'PlayStation 2 Slim (Chipeada)',
            'precio_original' => 250000,
            'precio' => 210000,
            'porcentaje_descuento' => 16,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/PS2-Fat-Console-Vert.jpg/960px-PS2-Fat-Console-Vert.jpg',
            'consola' => 'Sony',
            'estado' => 'Usado',
        ],
        (object) [
            'categoria' => 'Consola',
            'titulo' => 'Nintendo 64 Original + Joystick',
            'precio_original' => 300000,
            'precio' => 300000,
            'porcentaje_descuento' => 0,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/0/02/N64-Console-Set.png',
            'consola' => 'Nintendo',
            'estado' => 'Reacondicionado',
        ],
        (object) [
            'categoria' => 'Consola',
            'titulo' => 'Sega Genesis',
            'precio_original' => 180000,
            'precio' => 135000,
            'porcentaje_descuento' => 25,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/Sega-Genesis-Mk2-6button.jpg/1920px-Sega-Genesis-Mk2-6button.jpg',
            'consola' => 'Sega',
            'estado' => 'Usado',
        ],
        (object) [
            'categoria' => 'Consola',
            'titulo' => 'PlayStation 1 Classic',
            'precio_original' => 150000,
            'precio' => 150000,
            'porcentaje_descuento' => 0,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/PlayStation_Classic_Konsole_%2B_Controller_%28transparenter_Hintergrund%29.png/1920px-PlayStation_Classic_Konsole_%2B_Controller_%28transparenter_Hintergrund%29.png',
            'consola' => 'Sony',
            'estado' => 'Nuevo',
        ],
        (object) [
            'categoria' => 'Consola',
            'titulo' => 'Xbox Original Clásica',
            'precio_original' => 280000,
            'precio' => 224000,
            'porcentaje_descuento' => 20,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Xbox-Classic-Console-2Controllers.png/1920px-Xbox-Classic-Console-2Controllers.png',
            'consola' => 'Microsoft',
            'estado' => 'Usado',
        ],

        // --- COMBOS ---
        (object) [
            'categoria' => 'Combo',
            'titulo' => 'PS2 Slim + Silent Hill 2',
            'precio_original' => 335000,
            'precio' => 290000,
            'porcentaje_descuento' => 0,
            'imagen_url' => asset('images/combo1.png'),
            'consola' => 'Sony',
            'estado' => 'Usado',
        ],
        (object) [
            'categoria' => 'Combo',
            'titulo' => '2 Gameboy + Trilogía De Pokémon',
            'precio_original' => 220000,
            'precio' => 195000,
            'porcentaje_descuento' => 0,
            'imagen_url' => asset('images/combo2.png'),
            'consola' => 'Sega',
            'estado' => 'Usado',
        ],
    ];
}