<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');

        $clientes = User::where('rol', 'CLIENTE')
            ->when($buscar, fn($q) => $q->where('nombre', 'like', "%$buscar%")
                                        ->orWhere('email', 'like', "%$buscar%"))
            ->latest()->get();

        $admins = User::where('rol', 'ADMIN')
            ->when($buscar, fn($q) => $q->where('nombre', 'like', "%$buscar%")
                                        ->orWhere('email', 'like', "%$buscar%"))
            ->latest()->get();

        return view('usuario-dashboard', compact('clientes', 'admins', 'buscar'));
    }

    public function toggleRol(User $user)
    {
        $user->rol = $user->rol === 'ADMIN' ? 'CLIENTE' : 'ADMIN';
        $user->save();
        return back()->with('success', 'Rol actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        $user->delete(); // Soft delete → pone fecha en deleted_at
        return back()->with('success', 'Usuario desactivado correctamente.');
    }
}