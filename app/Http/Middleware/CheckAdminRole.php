<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->rol === 'administrador') {
            return $next($request);
        }

        Log::warning('Acceso denegado: el usuario no tiene permisos de administrador.', [
            'user_id' => Auth::id(),
            'route' => $request->path(),
        ]);

        return redirect('/home');
    }
}
