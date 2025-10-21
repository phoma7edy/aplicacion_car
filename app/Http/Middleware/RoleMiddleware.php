<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     // Si no está logueado
    //     if (!Auth::check()) {
    //         return redirect('/login');
    //     }

    //     // Obtener rol del usuario autenticado
    //     $rol = Auth::user()->rol->nombreRol ?? null;

    //     // Solo permitir acceso a administrador o vendedor
    //     if (!in_array($rol, ['administrador', 'vendedor'])) {
    //         abort(403, 'Acceso no autorizado.');
    //     }

    //     return $next($request);
    // }

    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            // Usuario no autenticado → redirigir a login
            return redirect()->route('login.register');
        }
        $rol = Auth::user()->rol->nombreRol ?? null;
        if (!in_array($rol, $roles)) {
            // Usuario autenticado pero con rol no permitido
            // return redirect()->route('login.register');
            // abort(403, 'Acceso no autorizado.');
            return redirect()->back()->with('error', 'No puede realizar esa acción.');

        }
         // 👇 Restricción personalizada para administrador
         

        // ⛔ Restricción especial para el administrador
        if ($rol === 'administrador') {
            $method = $request->method();      // POST, PUT, DELETE
            $path = $request->path();          // ruta completa

            // Acciones que el administrador NO puede realizar
            $accionesNoPermitidas = [
                'POST' => [
                    'registrar/vehiculo',
                    'registrar/proveedor',
                    'registrar/usuario',
                ],
                'PUT' => [
                    'usuario/edit/*',
                    'proveedor/edit/*',
                    'vehiculo/edit/*',
                ],
                'DELETE' => [
                    'delete/*',
                    'proveedor/delete/*',
                    'vehiculo/delete/*',
                ],
            ];

            foreach ($accionesNoPermitidas as $metodo => $rutas) {
                if ($method === $metodo) {
                    foreach ($rutas as $ruta) {
                        if ($request->is($ruta)) {
                            // Bloqueamos la acción con un mensaje
                            return redirect()->back()->with('error', 'No puede realizar esa acción.');
                        }
                    }
                }
            }
        }

        return $next($request);
    }
}
