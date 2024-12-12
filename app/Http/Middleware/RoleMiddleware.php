<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): mixed
    {
        // Verifica que el usuario esté autenticado
        if (Auth::check()) {
            // Verifica si el rol del usuario está dentro de los roles permitidos
            if (in_array(strtolower(Auth::user()->rol), array_map('strtolower', $roles))) {
                return $next($request);
            }
        }

        return redirect('/home')->with('error', 'No tienes permiso para acceder a esta página.');
    }
}