<?php

use App\Http\Controllers\ExitoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sobre-mi', function () {
return view('sobre-mi');
});

Route::get('/contacto', function () {
return view('contacto');
});
Route::post('/contacto', [ExitoController::class, 'procesar']);

Route::get('/footer', function () {
return view('footer');
});