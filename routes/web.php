<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Auth\Middleware\Authenticate;

// mostrar catalogo
Route::get('/',[HomeController::class, 'appHome'])->name('home');
Route::get('/login', [HomeController::class, 'loginRegister'])->name('login.register');
// Route::get('/dashboard', [HomeController::class, 'showAdmin'])->name('dashboard');

Route::get('inicio/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('inicio/login', [AuthenticatedSessionController::class, 'store']);
Route::get('inicio/register', [AuthenticatedSessionController::class, 'add_register'])->name('register');
Route::post('inicio/register', [AuthenticatedSessionController::class, 'add_register'])->name('register.post');

// DESTROY SESSION
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

//ingresar al admin ----- despues de validar
Route::middleware(['auth','role:administrador,vendedor'])->group(function () {    
    Route::get('/admin',[HomeController::class, 'showAdmin'])->name('admin.logHome'); //desde home de andmin que buelve a la mismo pagina
    Route::post('/admin',[HomeController::class, 'showAdmin'])->name('admin.loginReg'); //entra desde login validando user
    // reportes exportar en excel
    Route::get('/exportar-usuarios', [HomeController::class, 'exportUsuarios'])->name('exportar.usuarios');
    Route::get('/exportar-proveedores', [HomeController::class, 'exportProveedores'])->name('exportar.proveedores');
    Route::get('/exportar-vehiculos', [HomeController::class, 'exportVehiculos'])->name('exportar.vehiculos');
    //reportes exportar en pdf
    Route::get('/reporte-usuarios', [PdfController::class, 'exportUsuarios'])->name('pdf.usuarios');
    Route::get('/reporte-proveedores', [PdfController::class, 'exportProveedores'])->name('pdf.proveedores');
    Route::get('/reporte-vehiculos', [PdfController::class, 'exportVehiculos'])->name('pdf.vehiculos');

});
Route::middleware(['auth','role:administrador'])->group(function () {    
    // reportes exportar en excel
    Route::get('/exportar-usuarios', [HomeController::class, 'exportUsuarios'])->name('exportar.usuarios');
    Route::get('/exportar-proveedores', [HomeController::class, 'exportProveedores'])->name('exportar.proveedores');
    Route::get('/exportar-vehiculos', [HomeController::class, 'exportVehiculos'])->name('exportar.vehiculos');
    //reportes exportar en pdf
    Route::get('/reporte-usuarios', [PdfController::class, 'exportUsuarios'])->name('pdf.usuarios');
    Route::get('/reporte-proveedores', [PdfController::class, 'exportProveedores'])->name('pdf.proveedores');
    Route::get('/reporte-vehiculos', [PdfController::class, 'exportVehiculos'])->name('pdf.vehiculos');
        //resetear intentos de login
        
    Route::put('/reset-intentos/{id}', [AuthenticatedSessionController::class, 'resetIntentos'])
         ->name('usuarios.reset-intentos');
        
    });
    
Route::middleware(['auth','role:vendedor'])->group(function () {    
    // Route::get('/admin',[HomeController::class, 'showAdmin'])->name('admin.logHome'); //desde home de andmin que buelve a la mismo pagina
    // Route::post('/admin',[HomeController::class, 'showAdmin'])->name('admin.loginReg'); //entra desde login validando user
    // REGISTRAR DESDE FORMULARIO
    Route::post('/registrar/vehiculo', [RegisterController::class, 'agregarVehiculo'])->name('registrar.vehiculo');
    Route::post('/registrar/proveedor', [RegisterController::class, 'agregarProveedor'])->name('registrar.proveedor');
    Route::post('registrar/usuario', [RegisterController::class, 'agregarUsuario'])->name('registrar.usuario');
    //actualizar datos
    Route::put('/usuario/edit/{id}',[RegisterController::class,'updateUser'])->name('usuario.update');
    Route::put('/proveedor/edit/{id}',[RegisterController::class,'updateProveedor'])->name('proveedor.update');
    Route::put('/vehiculo/edit/{id}',[RegisterController::class,'updateVehiculo'])->name('vehiculo.update');
    // eliminar/ buscar por el id para elimianr
    Route::delete('delete/{id}',[RegisterController::class,'deleteUser'])->name('usuarios.delete');
    Route::delete('proveedor/delete/{id}',[RegisterController::class,'deleteProveedor'])->name('proveedor.delete');
    Route::delete('vehiculo/delete/{id}',[RegisterController::class,'deleteVehiculo'])->name('vehiculo.delete');

});

Route::middleware(['auth','role:visitante'])->group(function () {    
    Route::get('index/Cliente', [AuthenticatedSessionController::class, 'vistaCliente'])->name('vista.cliente');
});


// use App\Http\Controllers\TwoFactorController;

// Route::middleware(['auth'])->group(function () {
//     Route::get('/2fa/enable', [TwoFactorController::class, 'showEnableForm'])->name('2fa.show');
//     Route::post('/2fa/enable', [TwoFactorController::class, 'enable'])->name('2fa.enable');
// });
