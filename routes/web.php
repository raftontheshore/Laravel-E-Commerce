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


// Ejemplo Productos

Route::get('/juegos', function () {
    $products = [
        (object) [
            'title' => 'Silent Hill 3',
            'original_price' => 45000,
            'price' => 38250,
            'discount_percentage' => 15,
            'image_url' => 'https://i.3djuegos.com/juegos/5184/silent_hill_3/fotos/ficha/silent_hill_3-1697794.webp', 
            'is_international' => false,
        ],
        (object) [
            'title' => 'Shin Megami Tensei Persona 3 PS2',
            'original_price' => 60000,
            'price' => 48000,
            'discount_percentage' => 20,
            'image_url' => 'https://upload.wikimedia.org/wikipedia/en/4/47/Persona3cover.jpg',
            'is_international' => true,
        ],
        (object) [
            'title' => 'LSD Dream Emulator',
            'original_price' => 35000,
            'price' => 35000,
            'discount_percentage' => 0,
            'image_url' => 'https://upload.wikimedia.org/wikipedia/en/a/a9/LSD_Coverart.png',
            'is_international' => false,
        ]
    ];

    return view('juegos', compact('products'));
});