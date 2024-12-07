<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
   /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role  // El parámetro para el rol
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role): mixed
    {
        // Verifica si el usuario tiene el rol permitido
        if (auth()->check() && auth()->user()->rol === $role) {
            return $next($request);
        }

        // Redirige a una página de error o al inicio si no tiene el rol
        return redirect()->route('home')->with('error', 'No tienes permiso para acceder a esta página.');
    }
}
