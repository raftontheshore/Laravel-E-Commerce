<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarRol
{
    public function handle(Request $request, Closure $next, string $rol): mixed
    {
        // Si no hay usuario logueado o el rol no coincide, devuelve 403
        if (!$request->user() || strtolower($request->user()->rol) !== strtolower($rol)) {
            abort(403);
        }

        return $next($request);
    }
}