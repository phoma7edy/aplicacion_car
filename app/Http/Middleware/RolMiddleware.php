<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

class RolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle( $request, \Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            abort(403, 'No autenticado.');
        }

        $user = Auth::user();

        // Asegúrate de tener definida la relación 'rol' en el modelo User
        $userRol = $user->rol->nombre ?? null;
        // $userRol = auth()->user()->rol->nombre; // Ajusta según tu campo real


        if (!in_array($userRol, $roles)) {
            // return redirect()->route('login.register');

            abort(403, 'No autorizado.');
        }

        return $next($request);
    }
    
}
