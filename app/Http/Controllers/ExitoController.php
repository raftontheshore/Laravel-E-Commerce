<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class exitoController extends Controller
{
    public function procesar(Request $request)

    {   return view('exito');

        $request->validate([
            'nombre'  => 'required|min:2',
            'email'   => [
                'required',
                'email:rfc,dns',
                // Mínimo 4 caracteres antes del @
                'min:10',
                // Regex: dominio debe tener al menos 3 letras de extensión
                // y el usuario debe tener al menos 4 caracteres
                'regex:/^[a-zA-Z0-9._%+\-]{4,}@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$/'
            ], // valida formato Y dominio real
            'asunto'  => 'required|min:3',
            'mensaje' => 'required|min:10',
        ], [
            // Mensajes de error en español
            'nombre.required'  => 'El nombre es obligatorio.',
            'nombre.min'       => 'El nombre debe tener al menos 2 caracteres.',
            'email.required'   => 'El correo es obligatorio.',
            'email.email'      => 'Ingresá un correo válido (ej: nombre@dominio.com).',
            'asunto.required'  => 'El asunto es obligatorio.',       
            'asunto.min'       => 'El asunto debe tener al menos 3 caracteres.',
            'mensaje.required' => 'El mensaje es obligatorio.',
            'mensaje.min'      => 'El mensaje debe tener al menos 10 caracteres.',
        ]);

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
