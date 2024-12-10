<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAlumnoRole
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario tiene el rol de "alumno"
        if (Auth::check() && Auth::user()->rol === 'alumno') {
            return $next($request);
        }

        // Si no tiene el rol de alumno, redirige al home
        return redirect('/home')->with('error', 'Acceso denegado. Solo alumnos pueden acceder a esta página.');
    }
}