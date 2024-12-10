<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): mixed
    {
        // Verifica que el usuario esté autenticado y que su rol coincida
        if (Auth::check() && strtolower(Auth::user()->rol) === strtolower($role)) {
            return $next($request);
        }

        return redirect()->route('/home')->with('error', 'No tienes permiso para acceder a esta página.');
    }
}