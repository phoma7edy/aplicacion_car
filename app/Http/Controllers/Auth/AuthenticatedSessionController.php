<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Personas;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rules\Password;
use PragmaRX\Google2FAQRCode\Google2FA;

use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        if (!Auth::check()) {
            return view('login.login_register'); // Redirige si por alguna razón no pasó el middleware
        }
        return view('store.admin');
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(Request  $request): RedirectResponse
    // {
    //     $request->validate([
    //         'nomUsuario' => 'required',
    //         'password' => 'required',
    //     ]);

    //     Generar clave para este usuario+IP
    //     $key = Str::lower($request->input('nomUsuario')).'|'.$request->ip();
    //     $usuario = \App\Models\Usuario::where('nomUsuario', $request->nomUsuario)->first();

    //     1. Verificar si el usuario existe
    //     if ($usuario) {
    //         2. Revisar si está bloqueado
    //         if ($usuario->locked_until && now()->lessThan($usuario->locked_until)) {
    //             return back()->withErrors([
    //                 'nomUsuario' => 'Tu cuenta está bloqueada. Intenta nuevamente después de ' . $usuario->locked_until->diffForHumans(),
    //             ]);
    //         }
    //     }
    //     Intentar login
    //     if (!Auth::attempt($request->only('nomUsuario', 'password'), $request->boolean('remember'))) {
    //         if ($usuario) {
    //             $usuario->increment('login_attempts');

    //             Si ya intentó 3 veces, bloquear
    //             if ($usuario->login_attempts >= 3) {
    //                 $usuario->locked_until = now()->addHour(0.10); // bloqueado 1 hora
    //                 $usuario->save();

    //                 return back()->withErrors([
    //                     'nomUsuario' => 'Has intentado demasiadas veces. Tu cuenta está bloqueada por 1 hora. Contacta al administrador.',
    //                 ]);
    //             }

    //             $usuario->save();
    //         }
    //         return back()->withErrors([
    //             'nomUsuario' => 'Credenciales incorrectas.',
    //         ])->onlyInput('nomUsuario');
    //     }
    //     Si el login fue exitoso, limpiar contador
    //     $usuario->update([
    //         'login_attempts' => 0,
    //         'locked_until' => null,
    //     ]);


    //     $request->session()->regenerate();

    //     Obtener el rol
    //     $usuario = Auth::user();
    //     $rol = $usuario->rol->nombreRol ?? null;
    //     if ($rol === 'administrador' || $rol === 'vendedor') {
    //         return redirect()->intended('/admin');
    //     } elseif ($rol === 'visitante') {
    //         return redirect()->intended('index/Cliente');
    //     } else {
    //         return redirect()->intended('/login');
    //     }
    // }
    // public function store(Request $request): RedirectResponse
    // {
    //     // --- CONFIG ---
    //     $maxAttempts = 3;        // máximo intentos permitidos
    //     $decaySeconds = 60;      // bloqueo en segundos (60s)
    //     $key = 'login|' . $request->ip(); // llave por IP (puedes combinar con user agent si quieres)

    //     // 1) Si ya está bloqueada la IP, devolver error con segundos restantes
    //     if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
    //         $seconds = RateLimiter::availableIn($key);
    //         return back()->withErrors([
    //             'nomUsuario' => "Demasiados intentos. Intenta nuevamente en {$seconds} segundos."
    //         ])->onlyInput('nomUsuario');
    //     }

    //     // 2) Validación simple del formulario
    //     $request->validate([
    //         'nomUsuario' => 'required',
    //         'password' => 'required',
    //     ]);

    //     // 3) Intento de autenticación (esto NO comprueba/actualiza contadores por usuario;
    //     //    contamos todos los intentos independientemente del nombre pasado)
    //     if (!Auth::attempt($request->only('nomUsuario', 'password'), $request->boolean('remember'))) {
    //         // registrar intento (con tiempo de caducidad $decaySeconds)
    //         RateLimiter::hit($key, $decaySeconds);

    //         // obtener intentos realizados y restantes (para mostrar al usuario)
    //         $attempts = RateLimiter::attempts($key); // número de hits acumulados
    //         $remaining = max(0, $maxAttempts - $attempts);

    //         if ($attempts >= $maxAttempts) {
    //             $seconds = RateLimiter::availableIn($key);
    //             return back()->withErrors([
    //                 'nomUsuario' => "Has alcanzado el máximo de intentos. Bloqueado por {$seconds} segundos."
    //             ])->onlyInput('nomUsuario');
    //         }
    //         return back()->withErrors([
    //             'nomUsuario' => "Credenciales incorrectas. Te quedan {$remaining} intento(s)."
    //         ])->onlyInput('nomUsuario');
    //     }
    //     // 4) Login exitoso: limpiar contador de la IP y continuar
    //     RateLimiter::clear($key);

    //     $request->session()->regenerate();
    //     // 5) Si usabas contador por usuario (opcional), limpiarlo también
    //     $usuario = Auth::User();
    //     if ($usuario) {
    //         // Si en tu tabla Usuario tienes login_attempts/locked_until y quieres conservarlos:
    //         // $usuario->login_attempts = 0;
    //         // $usuario->locked_until = null;
    //         // $usuario->save();
    //     }
    //     // 6) Redirecciones según rol (dejé tu lógica original)
    //     $rol = $usuario->rol->nombreRol ?? null;
    //     if ($rol === 'administrador' || $rol === 'vendedor') {
    //         return redirect()->intended('/admin');
    //     } elseif ($rol === 'visitante') {
    //         return redirect()->intended('index/Cliente');
    //     } else {
    //         return redirect()->intended('/login');
    //     }
    // }

public function store(Request $request): RedirectResponse
{
    // --- CONFIG ---
    $maxAttempts = 3;        // máximo intentos permitidos
    $decaySeconds = 60;      // bloqueo en segundos (60s)
    $ip = $request->ip();
    $attemptsKey = "login:attempts|{$ip}";
    $lockUntilKey = "login:lock_until|{$ip}";

    // 0) Si la IP está bloqueada, devolver error con segundos restantes
    $lockUntil = Cache::get($lockUntilKey); // guardamos aquí un timestamp (int), si existe
    if ($lockUntil && now()->timestamp < $lockUntil) {
        $secondsRemaining = $lockUntil - now()->timestamp;
        return back()->withErrors([
            'nomUsuario' => "Demasiados intentos. Intenta nuevamente en {$secondsRemaining} segundos."
        ])->onlyInput('nomUsuario');
    }

    // 1) Validación simple del formulario
    $request->validate([
        'nomUsuario' => 'required',
        'password'   => 'required',
    ]);

    // 2) Intento de autenticación
    if (!Auth::attempt($request->only('nomUsuario', 'password'), $request->boolean('remember'))) {
        // Incrementamos contador de intentos (persistirlo, por ejemplo 1 hora)
        $attempts = Cache::get($attemptsKey, 0);
        $attempts++;
        // Guardamos attempts y le damos un TTL razonable (ej. 1 hora) para que no quede indefinidamente
        Cache::put($attemptsKey, $attempts, now()->addHour());

        // Si excede maxAttempts, creamos la marca de bloqueo por $decaySeconds
        if ($attempts > $maxAttempts) {
            $lockUntilTimestamp = now()->addSeconds($decaySeconds)->timestamp;
            // Guardamos ambos: llave de bloqueo (boolean) y hasta cuándo dura (timestamp)
            Cache::put($lockUntilKey, $lockUntilTimestamp, now()->addSeconds($decaySeconds));
            // (opcional) también podemos resetear attempts o mantenerlo; aquí lo dejamos para info
            return back()->withErrors([
                'nomUsuario' => "Has alcanzado el máximo de intentos. Bloqueado por {$decaySeconds} segundos."
            ])->onlyInput('nomUsuario');
        }

        $remaining = max(0, $maxAttempts - $attempts);
        return back()->withErrors([
            'nomUsuario' => "Credenciales incorrectas. Te quedan {$remaining} intento(s)."
        ])->onlyInput('nomUsuario');
    }

    // 3) Login exitoso: limpiar contador y desbloquear (si existe)
    Cache::forget($attemptsKey);
    Cache::forget($lockUntilKey);

    $request->session()->regenerate();

    // 4) Redirecciones según rol (tu lógica original)
    $usuario = Auth::user();
    if ($usuario) {
        // Si tienes campos en BD para esto y quieres mantenerlos, podrías limpiarlos aquí.
        // $usuario->login_attempts = 0;
        // $usuario->locked_until = null;
        // $usuario->save();
    }

    $rol = $usuario->rol->nombreRol ?? null;
    if ($rol === 'administrador' || $rol === 'vendedor') {
        return redirect()->intended('/admin');
    } elseif ($rol === 'visitante') {
        return redirect()->intended('index/Cliente');
    } else {
        return redirect()->intended('/login');
    }
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function add_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomUsuario'  => 'required|string|unique:usuario,nomUsuario|regex:/^[a-zA-Z0-9\s]+$/u',
            'correo'  => 'required|string|unique:personas,correo',
            'password' => [
                'required',
                'string',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.,;:])[A-Za-z\d@$!%*?&.,;:]+$/'
            ],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $persona = Personas::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'fechaRegistro' => now(), // O en la migración con default
        ]);
        // dd($persona);

        // Guardar usuario enlazado a esa persona
        $usuario = $persona->usuario()->create([
            'idPersona' => $persona->idPersona,
            'nomUsuario' => $request->nomUsuario,
            'password' => Hash::make($request->password),
            'estado' => true, // por defecto
            'idRol' => 3, // visitante
        ]);

        Auth::login($usuario);

        return redirect()->route('vista.cliente')->with('successUser', 'Registro exitoso de usuario');
        // return view('store.cliente');  
    }
    public function vistaCliente()
    {

        return view('store.cliente');
    }
    // ------intentos
    public function resetIntentos($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->login_attempts = 0;
        $usuario->last_attempt_at = null;
        $usuario->save();

        return redirect()->route('admin.logHome')->with('success', 'Intentos reiniciados correctamente.');
    }


    public function enable2FA(Request $request)
    {
        $user = Auth::Usuario();

        $google2fa = app('pragmarx.google2fa');

        // Generar clave secreta única
        $secret = $google2fa->generateSecretKey();

        // Guardar en la DB
        $user->google2fa_secret = $secret;
        $user->save();

        // Generar la URL QR (Google Charts)
        $qrCodeUrl = $google2fa->getQRCodeUrl(
            config('app.name'), // Nombre de la app
            $user->email,       // Usuario
            $secret
        );

        // Opcional: usar Google Chart API para mostrar QR
        $inlineUrl = "https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=" . urlencode($qrCodeUrl);

        return view('profile.2fa_enable', compact('inlineUrl', 'secret'));
    }


    public function confirm2FA(Request $request)
    {
        $request->validate([
            'one_time_password' => 'required|digits:6',
        ]);

        $user = Auth::Usuario();
        $google2fa = app('pragmarx.google2fa');

        if ($google2fa->verifyKey($user->google2fa_secret, $request->one_time_password)) {
            $user->google2fa_enabled = true;
            $user->save();
            return redirect()->route('profile')->with('success', '2FA activado correctamente');
        }

        return back()->withErrors(['one_time_password' => 'Código incorrecto']);
    }

    public function validate2FA(Request $request)
    {
        $request->validate(['one_time_password' => 'required|digits:6']);

        $userId = session('2fa:user:id');
        if (!$userId) {
            return redirect()->route('login')->withErrors(['error' => 'Sesión expirada']);
        }

        $user = \App\Models\Usuario::find($userId);
        $google2fa = app('pragmarx.google2fa');

        if ($google2fa->verifyKey($user->google2fa_secret, $request->one_time_password)) {
            // Código correcto → iniciar sesión
            Auth::login($user);

            // Limpiar la sesión temporal
            session()->forget('2fa:user:id');

            return redirect()->intended('/admin'); // o home
        }

        return back()->withErrors(['one_time_password' => 'Código incorrecto']);
    }
}
