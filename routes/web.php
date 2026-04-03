<?php

use App\Http\Controllers\ExitoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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

// Database Juegos
Route::get('/juegos', function () {
    $productos = [
        (object) [
            'titulo' => 'Silent Hill 3',
            'precio_original' => 45000,
            'precio' => 38250,
            'porcentaje_descuento' => 15,
            'imagen_url' => 'https://i.3djuegos.com/juegos/5184/silent_hill_3/fotos/ficha/silent_hill_3-1697794.webp', 
            'es_internacional' => false,
            'consola' => 'PS2',
            'estado' => 'Usado',
        ],
        (object) [
            'titulo' => 'Shin Megami Tensei Persona 3 PS2',
            'precio_original' => 60000,
            'precio' => 48000,
            'porcentaje_descuento' => 20,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/en/4/47/Persona3cover.jpg',
            'es_internacional' => true,
            'consola' => 'PS2',
            'estado' => 'Nuevo',
        ],
        (object) [
            'titulo' => 'LSD Dream Emulator',
            'precio_original' => 35000,
            'precio' => 35000,
            'porcentaje_descuento' => 0,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/en/a/a9/LSD_Coverart.png',
            'es_internacional' => false,
            'consola' => 'PS1',
            'estado' => 'Usado',
        ],
        (object) [
            'titulo' => 'Shin Megami Tensei IV 3DS',
            'precio_original' => 55000,
            'precio' => 49500,
            'porcentaje_descuento' => 10,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/en/f/f0/Shin_Megami_Tensei_IV.jpg',
            'es_internacional' => true,
            'consola' => '3DS',
            'estado' => 'Caja abierta',
        ],
        (object) [
            'titulo' => 'Silent Hill 2 PS2 Original',
            'precio_original' => 85000,
            'precio' => 85000,
            'porcentaje_descuento' => 0,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/en/9/95/Silent_Hill_2.jpg',
            'es_internacional' => false,
            'consola' => 'PS2',
            'estado' => 'Reacondicionado',
        ],
        (object) [
            'titulo' => 'Metal Gear Solid PS1',
            'precio_original' => 42000,
            'precio' => 29400,
            'porcentaje_descuento' => 30,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/en/3/33/Metal_Gear_Solid_cover_art.png',
            'es_internacional' => false,
            'consola' => 'PS1',
            'estado' => 'Usado',
        ]
    ];

    return view('juegos', compact('productos'));
});

// Database Consolas
Route::get('/consolas', function () {
    $productos = [
        (object) [
            'titulo' => 'PlayStation 2 Slim Chipeada',
            'precio_original' => 250000,
            'precio' => 210000,
            'porcentaje_descuento' => 16,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/PS2-Fat-Console-Vert.jpg/960px-PS2-Fat-Console-Vert.jpg', 
            'es_internacional' => false,
            'consola' => 'Sony',
            'estado' => 'Usado',
        ],
        (object) [
            'titulo' => 'Nintendo 64 Original + Joystick',
            'precio_original' => 300000,
            'precio' => 300000,
            'porcentaje_descuento' => 0,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/0/02/N64-Console-Set.png',
            'es_internacional' => true,
            'consola' => 'Nintendo',
            'estado' => 'Reacondicionado',
        ],
        (object) [
            'titulo' => 'Sega Genesis Model',
            'precio_original' => 180000,
            'precio' => 135000,
            'porcentaje_descuento' => 25,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/Sega-Genesis-Mk2-6button.jpg/1920px-Sega-Genesis-Mk2-6button.jpg',
            'es_internacional' => false,
            'consola' => 'Sega',
            'estado' => 'Usado',
        ],
        (object) [
            'titulo' => 'Game Boy Color Transparente',
            'precio_original' => 220000,
            'precio' => 198000,
            'porcentaje_descuento' => 10,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Game-Boy-FL.png/960px-Game-Boy-FL.png',
            'es_internacional' => true,
            'consola' => 'Nintendo',
            'estado' => 'Caja abierta',
        ],
        (object) [
            'titulo' => 'PlayStation 1 Classic',
            'precio_original' => 150000,
            'precio' => 150000,
            'porcentaje_descuento' => 0,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/PlayStation_Classic_Konsole_%2B_Controller_%28transparenter_Hintergrund%29.png/1920px-PlayStation_Classic_Konsole_%2B_Controller_%28transparenter_Hintergrund%29.png',
            'es_internacional' => false,
            'consola' => 'Sony',
            'estado' => 'Nuevo',
        ],
        (object) [
            'titulo' => 'Xbox Original Clásica',
            'precio_original' => 280000,
            'precio' => 224000,
            'porcentaje_descuento' => 20,
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Xbox-Classic-Console-2Controllers.png/1920px-Xbox-Classic-Console-2Controllers.png',
            'es_internacional' => false,
            'consola' => 'Microsoft',
            'estado' => 'Usado',
        ]
    ];

    return view('consolas', compact('productos'));
});