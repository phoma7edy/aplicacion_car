@extends('layouts.app')
@section('title', 'register')

@section('contentAdmin')

{{-- @vite(['resources/css/home.css']) --}}

    <div class="container ">
        
        {{-- REGISTRO DE USUARIOS --}}
        <div class="modal fade" id="user_register" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
            
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalLabel">REGISTRAR USUARIO</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="success-alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                            </div>
                        @endif
                    </div>  
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{ route('verRegistro') }}" method="POST" >
                                @csrf
                            <div class="row">
                                <div class="col-md-4 ">
                                        <strong><label for="" class="form-label text-secondary">Nombre</label></strong>
                                        <input type="text" class="form-control" name="nombre" id="">
                                    
                                        <strong><label for="" class="form-label text-secondary">Cedula</label></strong>
                                        <input type="number" class="form-control" name="ci" id="">
                                        
                                        <Strong><label for="" class="form-label text-secondary">Fecha Nacimiento</label></Strong>
                                        <input type="date" class="form-control" name="fechaNacimiento" id="">
                                    
                                        <strong><label for="" class="form-label text-secondary">Nombre Usuario</label></strong>
                                        <input type="text" class="form-control" name="nomUsuario" id="">
                                                        
                                </div>
                                <div class="col-md-4">
                                        <Strong><label for="" class="form-label text-secondary">Apellido Paterno</label></Strong>
                                        <input type="text" class="form-control" name="paterno" id="">
                                    
                                        <strong><label for="" class="form-label text-secondary">Correo</label></strong>
                                        <input type="email" class="form-control" name="correo" id="">
                                        
                                        <Strong><label for="" class="form-label text-secondary">Genero</label></Strong>
                                        <select class="form-control" name="genero" id="genero">
                                            <option selected>---</option>
                                            <option value="femenino" name="femenino" >Femenino</option>
                                            <option value="masculino" name="masculino" >Masculino</option>
                                        </select>
                                        
                                        <strong><label for="" class="form-label text-secondary">Password</label></strong>
                                        <input type="password" class="form-control" name="password" id="">
                                                    
                                </div>
                                <div class="col-md-4">
                                    
                                        <Strong><label for="" class="form-label text-secondary">Apellido Materno</label></Strong>
                                        <input type="text" class="form-control" name="materno" id="">
                                    
                                        <strong><label for="" class="form-label text-secondary">Telefono</label></strong>
                                        <input type="number" class="form-control" name="telefono" id="">
                                </div>
                            </div> <br>
                            <button type="submit" name="btnRegister" class="btn btn-primary" style="width: 80%;">Agregar</button>
                        </form>
                    

                    </div>
            
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button> --}}
                    </div>        
                </div>
            </div>
        </div>

        {{-- REGISTRO DE PROVEEDOR --}}
        <div class="modal fade" id="preveedor_register" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">           
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalLabel">REGISTRAR PROVEEDOR</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="success-alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>  
                    <!-- Modal body -->
                    <div class="modal-body">
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
                    

                    </div>
            
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button> --}}
                    </div>
            
                </div>
            </div>
        </div>

        {{-- REGISTRO DE PRODUCTO --}}
        <div class="modal fade" id="vehiculo_register" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
            
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalLabel">REGISTRAR PRODUCTO</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="success-alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>  
                    <!-- Modal body -->
                    <div class="modal-body">
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
                    </div>
            
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button> --}}
                    </div>
            
                </div>
            </div>
        </div>



    </div>






    


@endsection