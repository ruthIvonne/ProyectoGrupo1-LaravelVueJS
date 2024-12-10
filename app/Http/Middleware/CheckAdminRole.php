<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario tiene el rol de "administrador"
        if (Auth::check() && Auth::user()->rol === 'administrador') {
            return $next($request);
        }

        // Si no tiene el rol de administrador, redirige al home
        return redirect('/home')->with('error', 'Acceso denegado.');
    }
}
