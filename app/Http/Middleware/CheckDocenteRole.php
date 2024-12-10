<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckDocenteRole

{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario tiene el rol de "docente"
        if (Auth::check() && Auth::user()->rol === 'docente') {
            return $next($request);
        }

        // Si no tiene el rol de docente, redirige al home
        return redirect('/home')->with('error', 'Acceso denegado. Solo docentes pueden acceder a esta página.');
    }
}