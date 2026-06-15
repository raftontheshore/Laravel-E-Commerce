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
            ->when($buscar, function($q) use ($buscar) {
                $q->where(function($sub) use ($buscar) {
                    $sub->where('nombre', 'like', "%$buscar%")
                        ->orWhere('email', 'like', "%$buscar%");
                });
            })
            ->latest()->get();

        $admins = User::where('rol', 'ADMIN')
            ->when($buscar, function($q) use ($buscar) {
                $q->where(function($sub) use ($buscar) {
                    $sub->where('nombre', 'like', "%$buscar%")
                        ->orWhere('email', 'like', "%$buscar%");
                });
            })
            ->latest()->get();

        return view('dashboard-usuarios', compact('clientes', 'admins', 'buscar'));
    }

    public function toggleRol(User $user)
    {
        // Si es el único admin, no puede degradarse a cliente
        if ($user->rol === 'ADMIN') {
            $cantAdmins = User::where('rol', 'ADMIN')->count();
            if ($cantAdmins <= 1) {
                return back()->with('error', 'No se puede cambiar el rol del único administrador del sistema.');
            }
        }

        $user->rol = $user->rol === 'ADMIN' ? 'CLIENTE' : 'ADMIN';
        $user->save();
        return back()->with('success', 'Rol actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        // No puede eliminarse a sí mismo
        if ($user->id === auth()->id()) {
            return back()->with('error', 'No podés eliminarte a vos mismo.');
        }

        // No puede eliminarse el único admin
        if ($user->rol === 'ADMIN') {
            $cantAdmins = User::where('rol', 'ADMIN')->count();
            if ($cantAdmins <= 1) {
                return back()->with('error', 'No se puede eliminar el único administrador del sistema.');
            }
        }

        $user->delete();
        return back()->with('success', 'Usuario eliminado correctamente.');
    }
}