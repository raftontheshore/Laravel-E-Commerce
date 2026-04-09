<?php

use App\Http\Controllers\ExitoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // 1. Traemos toda la lista de productos
    $coleccion = collect(obtenerProductos());

    // 2. ESTOS SON los DESTACADOS 
    $productos_destacados = $coleccion->take(4);

    // 3. ESTAS las consolas (Buscamos solo las de categoría "Consola")
    $consolas = $coleccion->filter(function ($item) {
        return strtolower($item->categoria) === 'consola';
    });

    // 4. Mandamos LAS DOS COSAS juntas a la vista 'welcome'
    return view('welcome', compact('productos_destacados', 'consolas'));
});
Route::get('/sobre-mi', function () {
    return view('sobre-mi');
});

// Retorna la vista de contacto
Route::get('/contacto', function () {
    return view('contacto');
});

Route::post('/contacto', [ExitoController::class, 'procesar']);

Route::get('/footer', function () {
return view('footer');
});

// Procesa el formulario
Route::post('/contacto', [exitoController::class, 'procesar']);


Route::get('/juegos', function () {
    return view('juegos');
});

Route::get('/consolas', function () {
    return view('consolas');
});


Route::get('/explorar', function () {
    return view('explorar');
});

Route::get('/login', function (){
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/nosotros', function (){
    return view('nosotros');
});

Route::get('/terminos', function (){
    return view('terminos');
});

Route::get('/privacidad', function (){
    return view('privacidad');
});


Route::get('/faq', function (){
    return view('faq');
});
// --- BASE DE DATOS TEMPORAL ---
// Creamos una función que devuelve el arreglo para poder usarlo en varias rutas
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
        ]
    ];
}

// --- RUTA: TIENDA PRINCIPAL ---
Route::get('/tienda/{categoria?}', function ($categoria = 'consola') {
    
    $coleccion = collect(obtenerProductos());

    if ($categoria === 'todos') {
        $productos = $coleccion;
    } else {
        $productos = $coleccion->filter(function ($item) use ($categoria) {
            return strtolower($item->categoria) === strtolower($categoria);
        });
    }

    return view('tienda', compact('productos', 'categoria'));
});

// --- RUTA: EXPLORAR (Dashboard Oscuro) ---
Route::get('/explorar', function () {
    
    $coleccion = collect(obtenerProductos());

    // 1. Nuevos Productos: Filtramos los que tengan estado "Nuevo" (Juegos o Consolas)
    $nuevos_productos = $coleccion->filter(function ($item) {
        return strtolower($item->estado) === 'nuevo';
    });

    // 2. Ofertas de Juegos: Filtramos solo Juegos que tengan descuento
    $ofertas_juegos = $coleccion->filter(function ($item) {
        return strtolower($item->categoria) === 'juego' && $item->porcentaje_descuento > 0;
    });

    // 3. Combos: Filtramos todo lo que sea categoría Combo
    $combos = $coleccion->filter(function ($item) {
        return strtolower($item->categoria) === 'combo';
    });

    // Enviamos las tres listas a la vista explorar
    return view('explorar', compact('nuevos_productos', 'ofertas_juegos', 'combos'));
});