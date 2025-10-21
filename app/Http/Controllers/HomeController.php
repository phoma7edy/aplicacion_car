<?php

namespace App\Http\Controllers;

USE App\Exports\UsuariosExport;
USE App\Exports\ProveedoresExport;
USE App\Exports\VehiculosExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proveedores;
use App\Models\Personas;
use App\Models\Usuario;
use App\Models\Vehiculos;
use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Facades\Excel;


class HomeController extends Controller
{
    //

    public function welcome()
    {
        return view('welcome');
    }
    public function loginRegister()
    {
        return view('login.login_register');
    }
    public function appHome()
    {
        return view('store.seccionCar');
    }
    public function baseAdmin()
    {
        return view('store.seccionCar');
    }
    public function verRegistro() 
    {
        return view('forms.register');
    }
    
    public function showAdmin(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login'); // Redirige si por alguna razón no pasó el middleware
        }
        $personas = Personas::with('usuario')->get();
        $vehiculos = Vehiculos::all(); // puedes usar paginate() si hay muchos datos
        $proveedores = Proveedores::all();
        return view('store.admin',compact('proveedores','vehiculos','personas'));
    }




    public function exportUsuarios()
    {
        return Excel::download(new UsuariosExport, 'usuarios.xlsx');
    }

    public function exportProveedores()
    {
        return Excel::download(new ProveedoresExport, 'proveedores.xlsx');
    }

    public function exportVehiculos()
    {
        return Excel::download(new VehiculosExport, 'vehiculos.xlsx');
    }



}
