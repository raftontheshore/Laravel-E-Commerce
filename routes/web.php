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

// Procesa el formulario
Route::post('/contacto', [exitoController::class, 'procesar']);