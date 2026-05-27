<?php
// app/Http/Controllers/ContactoController.php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Consulta;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function store(Request $request)
    {
        if (auth()->check()) {
            // ── Usuario logueado → tabla consultas ──
            $request->validate([
                'asunto'  => 'required|string|max:150',
                'mensaje' => 'required|string',
            ]);

            Consulta::create([
                'id_usuario' => auth()->id(),
                'asunto'     => $request->asunto,
                'mensaje'    => $request->mensaje,
                'estado'     => 'abierta',
            ]);

        } else {
            // ── Usuario no logueado → tabla contactos ──
            $request->validate([
                'nombre'   => 'required|string|max:100',
                'apellido' => 'required|string|max:100',
                'email'    => 'required|email|max:150',
                'telefono' => 'nullable|string|max:20',
                'asunto'   => 'required|string|max:150',
                'mensaje'  => 'required|string',
            ]);

            Contacto::create([
                'nombre'   => $request->nombre . ' ' . $request->apellido,
                'email'    => $request->email,
                'telefono' => $request->telefono,
                'asunto'   => $request->asunto,
                'mensaje'  => $request->mensaje,
                'estado'   => 'pendiente',
            ]);
        }

        return back()->with('success', '¡Mensaje enviado correctamente! Te responderemos a la brevedad.');
    }
}