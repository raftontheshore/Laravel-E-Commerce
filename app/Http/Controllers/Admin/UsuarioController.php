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
        $user->rol = $user->rol === 'ADMIN' ? 'CLIENTE' : 'ADMIN';
        $user->save();
        return back()->with('success', 'Rol actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Usuario desactivado correctamente.');
    }
}