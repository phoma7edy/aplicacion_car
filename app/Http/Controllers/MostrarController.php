<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehiculos;
use App\Models\Personas;
use App\Models\Usuario;
use App\Models\Proveedores;


class MostrarController extends Controller
{
    //
    public function mostrarVehiculo()
    {
    //     $vehiculo = new vehiculo;
    //     $post=Post:: all();
    //      return $post;

        $vehiculos = Vehiculos::all(); // puedes usar paginate() si hay muchos datos
        return view('mostrar.resVehiculo', compact('vehiculos'));
    }

    
    public function mostrarUsuario()
    {
        $personas = Personas::all(); // puedes usar paginate() si hay muchos datos
        // $usuarios = Usuario::all(); // puedes usar paginate() si hay muchos datos
        return view('mostrar.resRegistro', compact('personas'));
    }

    public function mostrarProveedor()
    {
        $proveedores = Proveedores::all(); // puedes usar paginate() si hay muchos datos
        return view('mostrar.resProveedor', compact('proveedores'));  
    }
}
