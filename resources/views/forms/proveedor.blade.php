@extends('layouts.app')
@section('title', 'proveedor')

@section('contentAdmin')

{{-- @vite(['resources/css/home.css']) --}}

<div class="container" >
        <br><br><br><br><br>
        <h1 class="text-secondary">REGISTRAR PROVEEDOR</h1>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="success-alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('proveedor') }}" method="POST" >
             @csrf
            <div class="row ">
                <div class="col-md-4">                        
                        
                    </div>
                    <div class="col-md-4">
                        <Strong><label for="" class="form-label text-secondary">Nombre</label></Strong>
                        <input type="text" class="form-control" name="nombre" id="">
                        
                        <strong><label for="" class="form-label text-secondary">Nit</label></strong>
                        <input type="number" class="form-control" name="nit" id="">
                        
                        <Strong><label for="" class="form-label text-secondary">Direccion</label></Strong>
                        <input type="text" class="form-control" name="direccion" id=""> 
                        
                        
                        <strong><label for="" class="form-label text-secondary">telefono</label></strong>
                        <input type="number" class="form-control" name="telefono" id="">
                                    
                        <strong><label for="" class="form-label text-secondary">Correo</label></strong>
                        <input type="email" class="form-control" name="correo" id="">
                                    
                        <br>
                        <button type="submit" name="btnProveedor" class="btn btn-primary" style="width: 100%">Agregar</button>
                    </div>
                <div class="col-md-4">              
                       {{-- vacio --}}
                </div>
            </div>
        </form>
        <div class=" mt-4">
            <div class="text-center" style=" width: 100%;">
                <a href="{{ route('mostrar.proveedor') }}" class="btn btn-success ">
                    Ver Proveedores
                </a>
            </div>
        </div>
    </div>


@endsection