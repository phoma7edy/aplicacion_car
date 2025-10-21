<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionTimeout
{
    public function handle($request, Closure $next)
    {
        $timeout = 1000; // 30 minutos en segundos
        $lastActivity = Session::get('lastActivityTime');

        if ($lastActivity && (time() - $lastActivity) > $timeout) {
            Auth::logout();
            Session::flush();
            return redirect()->route('login')->with('message', 'Tu sesión ha expirado por inactividad.');
        }

        Session::put('lastActivityTime', time());

        return $next($request);
    }
}
