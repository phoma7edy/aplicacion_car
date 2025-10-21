<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use PragmaRX\Google2FA\Google2FA;
// use BaconQrCode\Renderer\ImageRenderer;
// use BaconQrCode\Renderer\Image\SvgImageBackEnd;
// use BaconQrCode\Renderer\RendererStyle\RendererStyle;
// use BaconQrCode\Writer;
// use Illuminate\Support\Facades\Auth;

// class TwoFactorController extends Controller
// {
//     public function showEnableForm()
//     {
//         $user = Auth::user();
//         $google2fa = new Google2FA();

//         $secret = $google2fa->generateSecretKey();

//         // Guardar secreto temporal en sesión
//         session(['2fa_secret' => $secret]);

//         $inlineUrl = $google2fa->getQRCodeInline(
//             'Mi Aplicación',
//             $user->email,
//             $secret
//         );

//         return view('admin.2fa_enable', compact('inlineUrl', 'secret'));
//     }

//     public function enable(Request $request)
//     {
//         $user = Auth::Usuario();
//         $user->google2fa_secret = session('2fa_secret');
//         $user->is_2fa_enabled = true;
//         $user->save();

//         session()->forget('2fa_secret');

//         return redirect()->route('admin.dashboard')
//             ->with('success', 'Autenticación de dos factores habilitada con éxito.');
//     }
// }
