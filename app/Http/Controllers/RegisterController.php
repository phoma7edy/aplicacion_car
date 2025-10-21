<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Personas;
use App\Models\Usuario;
use App\Models\Vehiculos;
use App\Models\Proveedores;
use Illuminate\Http\Request;
// hash
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    //
    public function verRegistro()
    {
        return view('forms.register');
    }
    public function vehiculo()
    {
        return view('forms.vehiculo');
    }
    public function proveedor()
    {
        return view('forms.proveedor');
    }



    public function agregarVehiculo(Request $request)
    {
        // Validación filtrar datos
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|alpha_num|max:25',
            'placa' => 'required|string|alpha_num|max:7',
            'color' => 'required|string|alpha_num|max:25',
            'transmision' => 'string|alpha_num|max:25',
            'descripcion' => 'string|alpha_num|max:25',
            'nroPuertas' => 'integer',
            'imagen_url' => 'required|image|max:2048'//|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }
        // $rutaImagen = $request->file('imagen')->store('productos', 'public');
        if ($request->hasFile('imagen_url')) {
            $file = $request->file('imagen_url');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $nombreLimpio = Str::slug($originalName);
            $extension = $file->getClientOriginalExtension();
            $nombreImagen = Str::random(3) . '-' . $nombreLimpio . '.' . $extension;
            $file->move(public_path('img\img\vehiculos'), $nombreImagen);
        }
        
        // Guardar en la base
        vehiculos::create([
            'nombre' => $request->nombre,
            'modelo' => $request->modelo,
            'marca' => $request->marca,
            'imagen_url' =>$nombreImagen,//$request->imagen_url,//// 
            'descripcion' => $request->descripcion,
            'placa' => $request->placa,
            'color' => $request->color,
            'estado' => $request->estado,
            'nomCategoria' => $request->nomCategoria,
        ]);

        return redirect()->back()->with('successVehiculo', 'Vehiculo registrado correctamente');
    }

    public function agregarProveedor(Request $request)
    {
        // Validación básica
        $request->validate([
            'nombre' => 'required|string|alpha_num|regex:/^[a-zA-Z0-9\s]+$/u',
            'nit' => 'required|alpha_num|integer',
            'direccion' => 'string|regex:/^[A-Za-z0-9\s\-]+$/|alpha_num',
            'telefono' => 'integer|alpha_num|regex:/^[A-Za-z0-9\s\-]+$/',
            'correo' => 'string|email',
        ]);

        // Guardar en la base
        proveedores::create([
            'nombre' => $request->nombre,
            'nit' => $request->nit,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
        ]);

        return redirect()->back()->with('successProveedor', 'Proveedor registrado correctamente');
    }

    public function agregarUsuario(Request $request)
{

    $request->validate([
        // Persona
        'nombre' => 'required|string|max:50|unique:personas,nombre|alpha_num',
        'paterno' => 'required|string|max:50|alpha_num',
        'materno' => 'nullable|string|max:50|alpha_num',
        'ci' => 'required|integer|unique:personas,ci|alpha_num',
        'genero' => 'required|string|alpha_num',
        'correo' => 'required|email|unique:personas,correo',
        'telefono' => 'required|numeric|alpha_num',

        // Usuario
        'nomUsuario' => 'required|string|max:50|alpha_num',
        // 'password' => 'required|string|min:6|alpha_num',
        'password' => [
        'required',
        'string',
        'min:6', // mínimo 6 caracteres
        'regex:/[a-z]/',      // al menos una letra minúscula
        'regex:/[A-Z]/',      // al menos una letra mayúscula
        'regex:/[0-9]/',      // al menos un número
        'regex:/[@$!%*?&]/',  // al menos un símbolo
    ],
        'fechaNacimiento' => 'required|date',
        'telefono' => 'numeric|alpha_num',
    ]);
    $messages = [
        'password.required' => 'La contraseña es obligatoria.',
        'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
        'password.regex' => 'La contraseña debe contener al menos una mayúscula, una minúscula, un número y un símbolo.',
    ];
    
    // Validator::make($request->all(), $rules, $messages);
    // Guardar datos en persona
    $persona = Personas::create([
        'nombre' => $request->nombre,
        'paterno' => $request->paterno,
        'materno' => $request->materno,
        'ci' => $request->ci,
        'genero' => $request->genero,
        'correo' => $request->correo,
        'telefono' => $request->telefono,
        'fechaRegistro' => now(), // O en la migración con default
    ]);
    // dd($persona);

    // Guardar usuario enlazado a esa persona
    $persona->usuario()->create([
        'idPersona' => $persona->idPersona,
        'nomUsuario' => $request->nomUsuario,
        'password' => Hash::make($request->password),
        'fechaNacimiento' => $request->fechaNacimiento,
        'estado' => true, // por defecto
        'idRol' => 3, // visitante
    ]);

    return back()->with('successUser', 'Registro exitoso de usuario');
}

//  UPDATE DATE 
    public function updateUser(Request $request, $id)   
    {
        $usuario = Personas::findOrFail($id);
        $usuario->update($request->all());

        return redirect()->back()->with('success1', 'Usuario actualizado correctamente.');
    }

    public function updateProveedor(Request $request, $idProveedor)
    {
        $proveedor = Proveedores::findOrFail($idProveedor);
        $proveedor->update($request->all());

        return redirect()->back()->with('success1', 'PROVEEDOR actualizado correctamente.');
    }
    public function updateVehiculo(Request $request, $idProducto)
    {
        $vehiculo = Vehiculos::findOrFail($idProducto);
        $vehiculo->update($request->all());

        return redirect()->back()->with('success1', 'VEHICULO actualizado correctamente.');
    }


    //ELIMINAR UN USUARIO   
    public function deleteUser(Request $request, $id)
    {
                // ]);
        $usuario = personas::findOrFail($id);
        $usuario->delete();
        // $usuario->update($request->all());

        return redirect()->back()->with('successDelete', 'Se ha eliminado el usuario correctamente.');
    }
    public function deleteProveedor(Request $request, $idProveedor)
    {
                
        $Proveedor = Proveedores::findOrFail($idProveedor);
        $Proveedor->delete();
        // $usuario->update($request->all());

        return redirect()->back()->with('successDelete', 'Se ha eliminado el PROVEEDOR correctamente.');
    }
    public function deleteVehiculo(Request $request, $idProducto)
    {
                // ]);
        $Vehiculo = Vehiculos::findOrFail($idProducto);
        $Vehiculo->delete();
        // $usuario->update($request->all());

        return redirect()->back()->with('successDelete', 'Se ha eliminado el VEHICULO correctamente.');
    }

    
}