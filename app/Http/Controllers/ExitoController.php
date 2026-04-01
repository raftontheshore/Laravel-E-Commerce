<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class exitoController extends Controller
{
    public function procesar(Request $request)
    {
        // Capturamos los datos enviados desde el formulario
        $nombre = $request->input('nombre');
        $email = $request->input('email');
        $mensaje = $request->input('mensaje');

        // Retornamos la vista de exito pasando las variables
        return view('exito', [
            'nombre' => $nombre,
            'email' => $email
        ]);
    }
}
