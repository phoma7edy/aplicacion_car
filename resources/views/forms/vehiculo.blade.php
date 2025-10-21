@extends('layouts.app')
@section('title', 'vehiculo')

@section('contentAdmin')

{{-- @vite(['resources/css/home.css']) --}}

<div class="container ">
        <br><br><br><br><br>
        <h1 class="text-secondary ">REGISTRAR VEHICULOS</h1>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="success-alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('vehiculo') }}" method="POST" >
            @csrf
            <div class="row">
                <div class="col-md-4">
                        {{-- <strong><label for="" class="form-label">Nombre</label></strong>
                        <input type="text" class="form-control" name="nombre" id="">
                    
                        <strong><label for="" class="form-label">Cedula</label></strong>
                        <input type="number" class="form-control" name="ci" id="">
                        
                        <Strong><label for="" class="form-label">Fecha Nacimiento</label></Strong>
                        <input type="date" class="form-control" name="fechaNacimiento" id="">
                    
                        <strong><label for="" class="form-label">Nombre Usuario</label></strong>
                        <input type="text" class="form-control" name="nomUsuario" id=""> --}}
                    
                    
                </div>
                <div class="col-md-4">
                        <Strong><label for="" class="form-label text-secondary">Placa</label></Strong>
                        <input type="text" class="form-control" name="placa" id="">
                    
                        <strong><label for="" class="form-label text-secondary">Color</label></strong>
                        <input type="text" class="form-control" name="color" id="">

                        <strong><label for="" class="form-label text-secondary">Transmision</label></strong>
                        <input type="text" class="form-control" name="transmision" id="">

                        <Strong><label for="" class="form-label text-secondary">Categoria</label></Strong>
                        <select class="form-control">
                            <option selected>---</option>
                            <option value="motos" name="motos" >Motos</option>
                            <option value="particular" name="particular">Particular</option>
                            <option value="camionetas" name="camionetas">Camionetas</option>
                            <option value="buss" name="buss">Buss</option>
                        </select>
                        <Strong><label for="" class="form-label text-secondary">Numero de puestas</label></Strong>
                        <input type="number" class="form-control" name="nroPuertas" id="">                        
                        
                        <Strong><label for="" class="form-label text-secondary">Estado</label></Strong>
                        <input type="text" class="form-control" name="estado" id="">                        
                        {{-- <select class="form-select">
                            <option selected>---</option>
                            <option value="nuevo" name="nuevo" >Nuevo</option>
                            <option value="recorido" name="recorido">Recorido</option>
                            <option value="usado" name="usado">Usado</option>
                        </select>  --}}
                        <br>
                        <button type="submit" name="btnVehiculo" class="btn btn-primary" style="width: 100%">Agregar</button>
                    </div>
                <div class="col-md-4">
                    
                    
                        {{-- <Strong><label for="" class="form-label">Apellido Materno</label></Strong>
                    
                        <strong><label for="" class="form-label">Telefono</label></strong>
                        <input type="number" class="form-control" name="telefono" id=""> --}}
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-center mt-4">
            <div class="text-center" style="max-width: 500px; width: 100%;">
                <a href="{{ route('mostrar.vehiculos') }}" class="btn btn-success btn-block">
                    Ver Vehículos
                </a>
            </div>
        </div>

    </div>


@endsection