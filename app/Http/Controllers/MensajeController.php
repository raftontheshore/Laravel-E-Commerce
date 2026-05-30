<?php
namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Contacto;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    public function index()
    {
        $consultas = Consulta::with('usuario')->latest()->get();
        $contactos = Contacto::latest()->get();
        return view('dashboard-mensajes', compact('consultas', 'contactos'));
    }

    public function updateConsulta(Request $request, $id)
    {
        $request->validate(['estado' => 'required|in:abierta,en_proceso,cerrada']);
        Consulta::findOrFail($id)->update(['estado' => $request->estado]);
        return back()->with('success', 'Estado actualizado');
    }

    public function updateContacto(Request $request, $id)
    {
        $request->validate(['estado' => 'required|in:pendiente,leido,respondido']);
        Contacto::findOrFail($id)->update(['estado' => $request->estado]);
        return back()->with('success', 'Estado actualizado');
    }

    public function destroyConsulta($id)
    {
        Consulta::findOrFail($id)->delete();
        return back()->with('success', 'Mensaje eliminado');
    }

    public function destroyContacto($id)
    {
        Contacto::findOrFail($id)->delete();
        return back()->with('success', 'Mensaje eliminado');
    }
}