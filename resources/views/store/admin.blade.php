@extends('layouts.app')
@section('title', 'admin')

@section('contentAdmin')
    <style>
        #alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            min-width: 250px;
            transition: opacity 0.5s ease-out;
        }
    </style>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}


    <script>
        // Espera 3 segundos, luego cierra la alerta con fade out
        setTimeout(function() {
            let alert = document.getElementById('alert');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => {
                    alert.remove();
                }, 500); // Espera a que termine la transición
            }
        }, 3000);
    </script>

    {{-- ALERTAS --}}
    @if ($errors->any())
        <div class="alert alert-danger" id="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('successUser'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
            {{ session('successUser') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('successProveedor'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="alert">
            {{ session('successProveedor') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('successVehiculo'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="alert">
            {{ session('successVehiculo') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- endalerts --}}

    <!-- partial -->
    <div class="main-panel">

        <div class="content-wrapper">
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">$12.34</h3>
                                        <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Potential growth</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">$17.34</h3>
                                        <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success">
                                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Revenue current</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">$12.34</h3>
                                        <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-danger">
                                        <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Daily Income</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">$31.53</h3>
                                        <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Expense current</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 grid-margin" id="accordion">
                    <div class="card">
                        <div class="card-body">
                            <center>
                                <h4 class="card-title text-primary">MOSTRANDO REGISTROS</h4>
                            </center>

                            <div class="">
                                {{-- MOSTRAR USUARIO --}}
                                <div class="container-usuarios collapse flex-grow-1 py-4" id="mostrar_usuario"
                                    data-bs-parent="#accordion">
                                    <h4 class="text-secondary">Lista de Usuarios</h4>
                                    @unless (Auth::user()->rol->nombreRol === 'vendedor')
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('exportar.usuarios') }}" class="btn btn-fw btn-inverse-success">
                                                Exportar a Excel
                                            </a>
                                            <a href="{{ route('pdf.usuarios') }}" class="btn btn-inverse-primary btn-fw">
                                                Descargar PDF
                                            </a>
                                        </div><!-- Botón eliminar aquí -->
                                    @endunless
                                    <div class="table-responsive">
                                        <table id="tabla-usuarios" class="table table-bordered">
                                            <thead class="">
                                                <tr class="table-dark">
                                                    <th>ID</th> {{--  <input type="text" class="form-control form-control-sm column-filter" data-column="0"> --}}
                                                    <th>NOMBRE</th>
                                                    <th>PATERNO</th>
                                                    <th>MATERNO</th>
                                                    <th>CI</th>
                                                    <th>GENERO</th>

                                                    <th>CORREO</th>
                                                    <th>TELEFONO</th>
                                                    <th>FECHA DE NACIMIENTO</th>
                                                    <th>USUARIO</th>
                                                    <th>ESTADO</th>
                                                    @unless (Auth::user()->rol->nombreRol === 'vendedor')
                                                        <th>LOGIN-RESET</th>
                                                    @endunless
                                                    @unless (Auth::user()->rol->nombreRol === 'administrador')
                                                        <!-- Botón eliminar aquí -->
                                                        <th>ACCIONES</th>
                                                    @endunless
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($personas as $persona)
                                                    <tr>
                                                        <td>{{ $persona->idPersona }}</td>
                                                        <td>{{ $persona->nombre }}</td>
                                                        <td>{{ $persona->paterno }}</td>
                                                        <td>{{ $persona->materno }}</td>
                                                        <td>{{ $persona->ci }}</td>
                                                        <td>{{ $persona->genero }}</td>
                                                        <td>{{ $persona->correo }}</td>
                                                        <td>{{ $persona->telefono }}</td>
                                                        <td>{{ $persona->usuario->fechaNacimiento ?? 'Sin usuario' }}</td>
                                                        <td>{{ $persona->usuario->nomUsuario ?? 'N/A' }}</td>
                                                        <td>{{ $persona->usuario->estado ?? 'N/A' }}</td>
                                                        @unless (Auth::user()->rol->nombreRol === 'vendedor')
                                                            <td>
                                                                <form
                                                                    action="{{ route('usuarios.reset-intentos', $persona->idPersona) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-info btn-sm">
                                                                        Reiniciar
                                                                    </button>
                                                                </form>

                                                            </td>
                                                        @endunless
                                                        @unless (Auth::user()->rol->nombreRol === 'administrador')
                                                            <!--  eliminar contenido para administrador aquí -->

                                                            <td>
                                                                {{-- btn para editar --}}
                                                                <a href="" role="button" class="btn btn-warning"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#user_edit{{ $persona->idPersona }}"><i
                                                                        class="mdi mdi-square-edit-outline"></i></a>
                                                                {{-- MODAL EDITAR USUARIO --}}
                                                                <div class="modal fade"
                                                                    id="user_edit{{ $persona->idPersona }}"
                                                                    aria-labelledby="modalLabel{{ $persona->idPersona }}"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">

                                                                            <!-- Modal Header -->
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title"
                                                                                    id="modalLabel{{ $persona->idPersona }}">
                                                                                    EDITAR DATOS DE
                                                                                    <strong>{{ $persona->nombre }}</strong>
                                                                                </h4>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"></button>
                                                                                @if ($errors->any())
                                                                                    <div class="alert alert-danger">
                                                                                        <ul>
                                                                                            @foreach ($errors->all() as $error)
                                                                                                <li>{{ $error }}</li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            <!-- Modal body -->
                                                                            <div class="modal-body">


                                                                                <form method="POST"
                                                                                    action="{{ route('usuario.update', $persona->idPersona) }}">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <strong><label for=""
                                                                                            class="form-label">Nombre</label></strong>
                                                                                    <input type="text" class="form-control"
                                                                                        value="{{ $persona->nombre }}"
                                                                                        name="nombre" id="">

                                                                                    <Strong><label for=""
                                                                                            class="form-label">Aellido
                                                                                            paterno</label></Strong>
                                                                                    <input type="text" class="form-control"
                                                                                        value="{{ $persona->paterno }}"
                                                                                        name="paterno" id="">

                                                                                    <Strong><label for=""
                                                                                            class="form-label">Apellido
                                                                                            materno</label></Strong>
                                                                                    <input type="text" class="form-control"
                                                                                        value="{{ $persona->materno }}"
                                                                                        name="materno" id="">

                                                                                    <strong><label for=""
                                                                                            class="form-label">C.I.</label></strong>
                                                                                    <input type="number" class="form-control"
                                                                                        value="{{ $persona->ci }}"
                                                                                        name="ci" id="">

                                                                                    <strong><label for=""
                                                                                            class="form-label">Gnero</label></strong>
                                                                                    <select class="form-select"
                                                                                        name="genero">
                                                                                        <option
                                                                                            {{ $persona->genero == null ? 'selected' : '' }}>
                                                                                            ---</option>
                                                                                        <option value="M"
                                                                                            {{ $persona->genero == 'M' ? 'selected' : '' }}>
                                                                                            Masculino</option>
                                                                                        <option value="F"
                                                                                            {{ $persona->genero == 'F' ? 'selected' : '' }}>
                                                                                            Femenino</option>
                                                                                    </select>

                                                                                    <strong><label for=""
                                                                                            class="form-label">Email</label></strong>
                                                                                    <input type="email" class="form-control"
                                                                                        value="{{ $persona->correo }}"
                                                                                        name="correo" id="">

                                                                                    <strong><label for=""
                                                                                            class="form-label">Telefono</label></strong>
                                                                                    <input type="number" class="form-control"
                                                                                        value="{{ $persona->telefono }}"
                                                                                        name="hobies" id="">

                                                                                    <strong><label for=""
                                                                                            class="form-label">Fecha
                                                                                            nacimiento</label></strong>
                                                                                    <input type="date" class="form-control"
                                                                                        value="{{ $persona->usuario->fechaNacimiento ?? 'no tiene' }}"
                                                                                        name="fechaNacimiento" id="">

                                                                                    <strong><label for=""
                                                                                            class="form-label">Usuario</label></strong>
                                                                                    <input type="number" class="form-control"
                                                                                        value="{{ $persona->usuario->nomUsuario ?? 'no tiene' }}"
                                                                                        name="nomUsuario" id="">

                                                                                  
                                                                                    {{-- <input type="submit" class="btn btn-success"> --}}
                                                                                    <button type="submit"
                                                                                        class="btn btn-success"
                                                                                        data-bs-dismiss="modal">Guardar</button>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger"
                                                                                        data-bs-dismiss="modal">Cancelar</button>
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
                                                                {{-- btn para eliminar --}}
                                                                <a href="" role="button" class="btn btn-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#user_delete{{ $persona->idPersona }}"><i
                                                                        class="mdi mdi-trash-can-outline"></i></a>
                                                                {{-- MODAL ELIMINAR USUARIO --}}
                                                                <div class="modal"
                                                                    id="user_delete{{ $persona->idPersona }}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">

                                                                            <!-- Modal Header -->
                                                                            <div class="modal-header bg-danger">
                                                                                <h4 class="modal-title">ESTA SEGURO QUE QUIERE
                                                                                    ELIMINAR A?</h4>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <!-- Modal body -->
                                                                            <div class="modal-body">
                                                                                <div class="table">
                                                                                    <table>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <h2>{{ strtoupper($persona->nombre . ' ') }}
                                                                                                    {{ strtoupper($persona->apPaterno . ' ') }}
                                                                                                    {{ strtoupper($persona->apMaterno) }}
                                                                                                </h2>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h2></h2>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h2></h2>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                                <form
                                                                                    action="{{ route('usuarios.delete', $persona->idPersona) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger"
                                                                                        data-bs-dismiss="modal">Si</button>
                                                                                    <button type="button"
                                                                                        class="btn btn-success"
                                                                                        data-bs-dismiss="modal">No</button>
                                                                                </form>
                                                                            </div>

                                                                            <!-- Modal footer -->
                                                                            <div class="modal-footer">
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @endunless
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center">No hay personas
                                                            registrados.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{-- MOSTRAR PROVEEDOR --}}
                                <div class="container-proveedor collapse" id="mostrar_proveedor"
                                    data-bs-parent="#accordion">
                                    <h4 class="text-secondary">Lista de Proveedores</h4>
                                    @unless (Auth::user()->rol->nombreRol === 'vendedor')
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('exportar.proveedores') }}"
                                                class="btn btn-fw btn-inverse-success">
                                                Exportar a Excel
                                            </a>
                                            <a href="{{ route('pdf.proveedores') }}" class="btn btn-inverse-primary btn-fw">
                                                Descargar PDF
                                            </a>
                                        </div><!-- Botón eliminar aquí -->
                                    @endunless
                                    <div class="table-responsive">
                                        <table id="tabla-proveedores" class="table table-dark table-hover">
                                            <thead>
                                                <tr class="table-dark">
                                                    <th>ID</th>
                                                    <th>NOMBRE</th>
                                                    <th>NIT</th>
                                                    <th>DIRECCION</th>
                                                    <th>TELEFONO</th>
                                                    <th>CORREO</th>
                                                    @unless (Auth::user()->rol->nombreRol === 'administrador')
                                                        <th>ACCIONES</th>
                                                    @endunless
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($proveedores as $proveedor)
                                                    <tr>
                                                        <td>{{ $proveedor->idProveedor }}</td>
                                                        <td>{{ $proveedor->nombre }}</td>
                                                        <td>{{ $proveedor->nit }}</td>
                                                        <td>{{ $proveedor->direccion }}</td>
                                                        <td>{{ $proveedor->telefono }}</td>
                                                        <td>{{ $proveedor->correo }}</td>
                                                        @unless (Auth::user()->rol->nombreRol === 'administrador')
                                                            <td>
                                                                {{-- btn para editar --}}
                                                                <a href="" role="button" class="btn btn-warning"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#proveedor_edit{{ $proveedor->idProveedor }}"><i
                                                                        class="mdi mdi-square-edit-outline"></i></a>
                                                                {{-- MODAL EDITAR USUARIO --}}
                                                                <div class="modal fade"
                                                                    id="proveedor_edit{{ $proveedor->idProveedor }}"
                                                                    aria-labelledby="modalLabel{{ $proveedor->idProveedor }}"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">

                                                                            <!-- Modal Header -->
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title"
                                                                                    id="modalLabel{{ $proveedor->idProveedor }}">
                                                                                    EDITAR DATOS DE
                                                                                    <strong>{{ $proveedor->nombre }}</strong>
                                                                                </h4>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"></button>
                                                                                @if ($errors->any())
                                                                                    <div class="alert alert-danger">
                                                                                        <ul>
                                                                                            @foreach ($errors->all() as $error)
                                                                                                <li>{{ $error }}</li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            <!-- Modal body -->
                                                                            <div class="modal-body">


                                                                                <form method="POST"
                                                                                    action="{{ route('proveedor.update', $proveedor->idProveedor) }}">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <strong><label for=""
                                                                                            class="form-label">NOMBRE</label></strong>
                                                                                    <input type="text" class="form-control"
                                                                                        value="{{ $proveedor->nombre }}"
                                                                                        name="nombre" id="">

                                                                                    <Strong><label for=""
                                                                                            class="form-label">NIT</label></Strong>
                                                                                    <input type="number" class="form-control"
                                                                                        value="{{ $proveedor->nit }}"
                                                                                        name="nit" id="">

                                                                                    <Strong><label for=""
                                                                                            class="form-label">DIRECCION</label></Strong>
                                                                                    <input type="text" class="form-control"
                                                                                        value="{{ $proveedor->direccion }}"
                                                                                        name="direccion" id="">

                                                                                    <strong><label for=""
                                                                                            class="form-label">TELEFONO</label></strong>
                                                                                    <input type="number" class="form-control"
                                                                                        value="{{ $proveedor->telefono }}"
                                                                                        name="telefono" id="">

                                                                                    <strong><label for=""
                                                                                            class="form-label">EMAIL</label></strong>
                                                                                    <input type="email" class="form-control"
                                                                                        value="{{ $proveedor->correo }}"
                                                                                        name="correo" id="">

                                                                                    {{-- <input type="submit" class="btn btn-success"> --}}
                                                                                    <button type="submit"
                                                                                        class="btn btn-success"
                                                                                        data-bs-dismiss="modal">Guardar</button>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger"
                                                                                        data-bs-dismiss="modal">Cancelar</button>
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
                                                                {{-- btn para eliminar --}}
                                                                <a href="" role="button" class="btn btn-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#Proveedor_delete{{ $proveedor->idProveedor }}"><i
                                                                        class="mdi mdi-trash-can-outline"></i></a>
                                                                {{-- MODAL ELIMINAR USUARIO --}}
                                                                <div class="modal"
                                                                    id="Proveedor_delete{{ $proveedor->idProveedor }}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">

                                                                            <!-- Modal Header -->
                                                                            <div class="modal-header bg-danger">
                                                                                <h4 class="modal-title">ESTA SEGURO QUE QUIERE
                                                                                    ELIMINAR A?</h4>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <!-- Modal body -->
                                                                            <div class="modal-body">
                                                                                <div class="table">
                                                                                    <table>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <h2>{{ strtoupper($proveedor->nombre . ' ' . $proveedor->nit) }}
                                                                                                </h2>
                                                                                            </td>

                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                                <form
                                                                                    action="{{ route('proveedor.delete', $proveedor->idProveedor) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger"
                                                                                        data-bs-dismiss="modal">Si</button>
                                                                                    <button type="button"
                                                                                        class="btn btn-success"
                                                                                        data-bs-dismiss="modal">No</button>
                                                                                </form>
                                                                            </div>

                                                                            <!-- Modal footer -->
                                                                            <div class="modal-footer">
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @endunless
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center">No hay proveedores
                                                            registrados.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{-- MOSTRAR VEHICULO --}}
                                <div class="container-vehiculo collapse" id="mostrar_vehiculo"
                                    data-bs-parent="#accordion">
                                    <h4 class="text-secondary">Lista de Vehículos</h4>
                                    @unless (Auth::user()->rol->nombreRol === 'vendedor')
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('exportar.vehiculos') }}"
                                                class="btn btn-fw btn-inverse-success">
                                                Exportar a Excel
                                            </a>
                                            <a href="{{ route('pdf.vehiculos') }}" class="btn btn-inverse-primary btn-fw">
                                                Descargar PDF
                                            </a>
                                        </div><!-- Botón eliminar aquí -->
                                    @endunless

                                    <div class="table-responsive">
                                        <table id="tabla-vehiculos" class="table table-dark table-hover">
                                            <thead class="">
                                                <tr class="table-dark">
                                                    <th>ID</th>
                                                    <th>NOMBRE</th>
                                                    <th>MODELO</th>
                                                    <th>MARCA</th>
                                                    <th>IMAGEN</th>
                                                    <th>DESCRIPCION</th>
                                                    <th>PLACA</th>
                                                    <th>COLOR</th>
                                                    <th>CATEGORIA</th>
                                                    <th>ESTADO</th>
                                                    @unless (Auth::user()->rol->nombreRol === 'administrador')
                                                        <th>ACCIONES</th>
                                                    @endunless
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($vehiculos as $vehiculo)
                                                    <tr>
                                                        <td>{{ $vehiculo->idProducto }}</td>
                                                        <td>{{ $vehiculo->nombre }}</td>
                                                        <td>{{ $vehiculo->modelo }}</td>
                                                        <td>{{ $vehiculo->marca }}</td>
                                                        <td>{{ $vehiculo->imagen_url }}</td>
                                                        <td>{{ $vehiculo->descripcion }}</td>
                                                        <td>{{ $vehiculo->placa }}</td>
                                                        <td>{{ $vehiculo->color }}</td>
                                                        <td>{{ $vehiculo->nomCategoria }}</td>
                                                        <td>{{ $vehiculo->estado }}</td>
                                                        @unless (Auth::user()->rol->nombreRol === 'administrador')
                                                            <td>
                                                                {{-- btn para editar --}}
                                                                <a href="" role="button" class="btn btn-warning"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#vehiculo_edit{{ $vehiculo->idProducto }}"><i
                                                                        class="mdi mdi-square-edit-outline"></i></a>
                                                                {{-- MODAL EDITAR VEHICULO --}}
                                                                <div class="modal fade"
                                                                    id="vehiculo_edit{{ $vehiculo->idProducto }}"
                                                                    aria-labelledby="modalLabel{{ $vehiculo->idProducto }}"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">

                                                                            <!-- Modal Header -->
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title"
                                                                                    id="modalLabel{{ $vehiculo->idProducto }}">
                                                                                    EDITAR DATOS DE
                                                                                    <strong>{{ $vehiculo->nombre }}</strong>
                                                                                </h4>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"></button>
                                                                                @if ($errors->any())
                                                                                    <div class="alert alert-danger">
                                                                                        <ul>
                                                                                            @foreach ($errors->all() as $error)
                                                                                                <li>{{ $error }}</li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            <!-- Modal body -->
                                                                            <div class="modal-body">


                                                                                <form method="POST"
                                                                                    action="{{ route('vehiculo.update', $vehiculo->idProducto) }}">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <strong><label for=""
                                                                                            class="form-label">NOMBRE</label></strong>
                                                                                    <input type="text" class="form-control"
                                                                                        value="{{ $vehiculo->nombre }}"
                                                                                        name="nombre" id="">

                                                                                    <Strong><label for=""
                                                                                            class="form-label">MODELO</label></Strong>
                                                                                    <input type="text" class="form-control"
                                                                                        value="{{ $vehiculo->modelo }}"
                                                                                        name="modelo" id="">

                                                                                    <Strong><label for=""
                                                                                            class="form-label">MARCA</label></Strong>
                                                                                    <input type="text" class="form-control"
                                                                                        value="{{ $vehiculo->marca }}"
                                                                                        name="marca" id="">

                                                                                    <strong><label for=""
                                                                                            class="form-label">IMAGEN</label></strong>
                                                                                    <input type="" class="form-control"
                                                                                        value="{{ $vehiculo->imagen_url }}"
                                                                                        name="imagen_url" id="">

                                                                                    <strong><label for=""
                                                                                            class="form-label">DESCRIPCION</label></strong>
                                                                                    <input type="textarea"
                                                                                        class="form-control"
                                                                                        value="{{ $vehiculo->descripcion }}"
                                                                                        name="descripcion" id="">

                                                                                    <strong><label for=""
                                                                                            class="form-label">PLACA</label></strong>
                                                                                    <input type="text" class="form-control"
                                                                                        value="{{ $vehiculo->placa }}"
                                                                                        name="placa" id="">

                                                                                    <strong><label for=""
                                                                                            class="form-label">COLOR</label></strong>
                                                                                    <input type="text" class="form-control"
                                                                                        value="{{ $vehiculo->color }}"
                                                                                        name="color" id="">

                                                                                    <strong><label for=""
                                                                                            class="form-label">CATEGORIA</label></strong>
                                                                                    <select class="form-select form-control"
                                                                                        name="nomCategoria">
                                                                                        <option
                                                                                            {{ $vehiculo->nomCategoria == null ? 'selected' : '' }}>
                                                                                            ---</option>
                                                                                        <option value="camion"
                                                                                            {{ $vehiculo->nomCategoria == 'camion' ? 'selected' : '' }}>
                                                                                            Camion</option>
                                                                                        <option value="camioneta"
                                                                                            {{ $vehiculo->nomCategoria == 'camioneta' ? 'selected' : '' }}>
                                                                                            Camioneta</option>
                                                                                        <option value="deportivo"
                                                                                            {{ $vehiculo->nomCategoria == 'deportivo' ? 'selected' : '' }}>
                                                                                            Camioneta</option>
                                                                                        <option value="motos"
                                                                                            {{ $vehiculo->nomCategoria == 'motos' ? 'selected' : '' }}>
                                                                                            Motos</option>
                                                                                    </select>

                                                                                    <strong><label for=""
                                                                                            class="form-label">ESTADO</label></strong>
                                                                                    <select class="form-select form-control"
                                                                                        name="estado">
                                                                                        <option
                                                                                            {{ $vehiculo->estado == null ? 'selected' : '' }}>
                                                                                            ---</option>
                                                                                        <option value="disponible"
                                                                                            {{ $vehiculo->estado == 'disponible' ? 'selected' : '' }}>
                                                                                            Disponible</option>
                                                                                        <option value="reparacion"
                                                                                            {{ $vehiculo->estado == 'reparacion' ? 'selected' : '' }}>
                                                                                            Reparacion</option>
                                                                                        <option value="vendido"
                                                                                            {{ $vehiculo->estado == 'vendido' ? 'selected' : '' }}>
                                                                                            Vendido</option>
                                                                                    </select>

                                                                                    {{-- <input type="submit" class="btn btn-success"> --}}
                                                                                    <button type="submit"
                                                                                        class="btn btn-success"
                                                                                        data-bs-dismiss="modal">Guardar</button>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger"
                                                                                        data-bs-dismiss="modal">Cancelar</button>
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
                                                                {{-- btn para eliminar --}}
                                                                <a href="" role="button" class="btn btn-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#vehiculo_delete{{ $vehiculo->idProducto }}"><i
                                                                        class="mdi mdi-trash-can-outline"></i></a>
                                                                {{-- MODAL ELIMINAR USUARIO --}}
                                                                <div class="modal"
                                                                    id="vehiculo_delete{{ $vehiculo->idProducto }}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">

                                                                            <!-- Modal Header -->
                                                                            <div class="modal-header bg-danger">
                                                                                <h4 class="modal-title">ESTA SEGURO QUE QUIERE
                                                                                    ELIMINAR A?</h4>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"></button>
                                                                            </div>
                                                                            <!-- Modal body -->
                                                                            <div class="modal-body">
                                                                                <div class="table">
                                                                                    <table>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <h2>{{ strtoupper($vehiculo->nombre . ' ' . $vehiculo->modelo . ' ') }}
                                                                                                </h2>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h2></h2>
                                                                                            </td>
                                                                                            <td>
                                                                                                <h2></h2>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                                <form
                                                                                    action="{{ route('vehiculo.delete', $vehiculo->idProducto) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger"
                                                                                        data-bs-dismiss="modal">Si</button>
                                                                                    <button type="button"
                                                                                        class="btn btn-success"
                                                                                        data-bs-dismiss="modal">No</button>
                                                                                </form>
                                                                            </div>

                                                                            <!-- Modal footer -->
                                                                            <div class="modal-footer">
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        @endunless
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center">No hay vehículos
                                                            registrados.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Transaction History</h4>
                            <canvas id="transaction-history" class="transaction-chart"></canvas>
                            <div
                                class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                <div class="text-md-center text-xl-left">
                                    <h6 class="mb-1">Transfer to Paypal</h6>
                                    <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                                </div>
                                <div
                                    class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                    <h6 class="font-weight-bold mb-0">$236</h6>
                                </div>
                            </div>
                            <div
                                class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                <div class="text-md-center text-xl-left">
                                    <h6 class="mb-1">Tranfer to Stripe</h6>
                                    <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                                </div>
                                <div
                                    class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                    <h6 class="font-weight-bold mb-0">$593</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                                <h4 class="card-title mb-1">Productos mas vendidos
                                </h4>
                                <p class="text-muted mb-1">Your data status</p>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="preview-list">
                                        <div class="preview-item border-bottom">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-primary">
                                                    <i class="mdi mdi-file-document"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject">Admin dashboard design</h6>
                                                    <p class="text-muted mb-0">Broadcast web app mockup</p>
                                                </div>
                                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                    <p class="text-muted">15 minutes ago</p>
                                                    <p class="text-muted mb-0">30 tasks, 5 issues </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item border-bottom">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-success">
                                                    <i class="mdi mdi-cloud-download"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject">Wordpress Development</h6>
                                                    <p class="text-muted mb-0">Upload new design</p>
                                                </div>
                                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                    <p class="text-muted">1 hour ago</p>
                                                    <p class="text-muted mb-0">23 tasks, 5 issues </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item border-bottom">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-info">
                                                    <i class="mdi mdi-clock"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject">Project meeting</h6>
                                                    <p class="text-muted mb-0">New project discussion</p>
                                                </div>
                                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                    <p class="text-muted">35 minutes ago</p>
                                                    <p class="text-muted mb-0">15 tasks, 2 issues</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item border-bottom">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-danger">
                                                    <i class="mdi mdi-email-open"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject">Broadcast Mail</h6>
                                                    <p class="text-muted mb-0">Sent release details to team</p>
                                                </div>
                                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                    <p class="text-muted">55 minutes ago</p>
                                                    <p class="text-muted mb-0">35 tasks, 7 issues </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-warning">
                                                    <i class="mdi mdi-chart-pie"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject">UI Design</h6>
                                                    <p class="text-muted mb-0">New application planning</p>
                                                </div>
                                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                    <p class="text-muted">50 minutes ago</p>
                                                    <p class="text-muted mb-0">27 tasks, 4 issues </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Visitors by Countries</h4>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <i class="flag-icon flag-icon-us"></i>
                                                    </td>
                                                    <td>USA</td>
                                                    <td class="text-right"> 1500 </td>
                                                    <td class="text-right font-weight-medium"> 56.35% </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="flag-icon flag-icon-de"></i>
                                                    </td>
                                                    <td>Germany</td>
                                                    <td class="text-right"> 800 </td>
                                                    <td class="text-right font-weight-medium"> 33.25% </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="flag-icon flag-icon-au"></i>
                                                    </td>
                                                    <td>Australia</td>
                                                    <td class="text-right"> 760 </td>
                                                    <td class="text-right font-weight-medium"> 15.45% </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="flag-icon flag-icon-gb"></i>
                                                    </td>
                                                    <td>United Kingdom</td>
                                                    <td class="text-right"> 450 </td>
                                                    <td class="text-right font-weight-medium"> 25.00% </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="flag-icon flag-icon-ro"></i>
                                                    </td>
                                                    <td>Romania</td>
                                                    <td class="text-right"> 620 </td>
                                                    <td class="text-right font-weight-medium"> 10.25% </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="flag-icon flag-icon-br"></i>
                                                    </td>
                                                    <td>Brasil</td>
                                                    <td class="text-right"> 230 </td>
                                                    <td class="text-right font-weight-medium"> 75.00% </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div id="audience-map" class="vector-map"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div id="audience-map" style="height: 500px; width: 100%;"></div> --}}

            {{-- * **********************  MODAL REGISTER --}}

            <div class="container ">

                {{-- REGISTRO DE USUARIOS --}}
                <div class="modal fade" id="user_register" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="modalLabel">REGISTRAR USUARIO</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="{{ route('registrar.usuario') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong><label for=""
                                                    class="form-label text-secondary">Nombre</label></strong>
                                            <input type="text" class="form-control" name="nombre" id="">

                                            <Strong><label for="" class="form-label text-secondary">Apellido
                                                    Paterno</label></Strong>
                                            <input type="text" class="form-control" name="paterno" id="">

                                            <Strong><label for="" class="form-label text-secondary">Apellido
                                                    Materno</label></Strong>
                                            <input type="text" class="form-control" name="materno" id="">

                                            <strong><label for=""
                                                    class="form-label text-secondary">C.I.</label></strong>
                                            <input type="number" class="form-control" name="ci" id="">



                                            <Strong><label for=""
                                                    class="form-label text-secondary">Genero</label></Strong>
                                            <select class="form-control" name="genero" id="genero">
                                                <option selected>---</option>
                                                <option value="F" name="F">Femenino</option>
                                                <option value="M" name="M">Masculino</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <Strong><label for="" class="form-label text-secondary">Fecha
                                                    Nacimiento</label></Strong>
                                            <input type="date" class="form-control" name="fechaNacimiento"
                                                id="">

                                            <strong><label for=""
                                                    class="form-label text-secondary">Correo</label></strong>
                                            <input type="email" class="form-control" name="correo" id="">



                                            <strong><label for=""
                                                    class="form-label text-secondary">Telefono</label></strong>
                                            <input type="number" class="form-control" name="telefono" id="">

                                            <strong><label for="" class="form-label text-secondary">Nombre
                                                    Usuario</label></strong>
                                            <input type="text" class="form-control" name="nomUsuario" id="" placeholder="usuario para iniciar sesion">

                                            <strong><label for=""
                                                    class="form-label text-secondary">Password</label></strong>
                                            <input type="password" class="form-control" name="password" id="" placeholder="por lo menos una M,m, nuemro y simbolos">

                                        </div>
                                    </div> <br>
                                    <button type="submit" name="btnRegister" class="btn btn-primary"
                                        style="width: 80%;">Agregar</button>
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
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="{{ route('registrar.proveedor') }}" method="POST">
                                    @csrf
                                    <div class="row ">
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-8">
                                            <Strong><label for=""
                                                    class="form-label text-secondary">Nombre</label></Strong>
                                            <input type="text" class="form-control" name="nombre" id="">

                                            <strong><label for=""
                                                    class="form-label text-secondary">Nit</label></strong>
                                            <input type="number" class="form-control" name="nit" id="">

                                            <Strong><label for=""
                                                    class="form-label text-secondary">Direccion</label></Strong>
                                            <input type="text" class="form-control" name="direccion" id="">


                                            <strong><label for=""
                                                    class="form-label text-secondary">telefono</label></strong>
                                            <input type="number" class="form-control" name="telefono" id="">

                                            <strong><label for=""
                                                    class="form-label text-secondary">Correo</label></strong>
                                            <input type="email" class="form-control" name="correo" id="">

                                            <br>
                                            <button type="submit" name="btnProveedor" class="btn btn-primary"
                                                style="width: 100%">Agregar</button>
                                        </div>
                                        <div class="col-md-2">
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
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="{{ route('registrar.vehiculo') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-8">
                                            <Strong><label for=""
                                                    class="form-label text-secondary">NOMBRE</label></Strong>
                                            <input type="text" class="form-control" name="nombre" id="">

                                            <Strong><label for=""
                                                    class="form-label text-secondary">MODELO</label></Strong>
                                            <input type="text" class="form-control" name="modelo" id="">

                                            <Strong><label for=""
                                                    class="form-label text-secondary">MARCA</label></Strong>
                                            <input type="text" class="form-control" name="marca" id="">

                                            <Strong><label for=""
                                                    class="form-label text-secondary">IMAGEN</label></Strong>
                                            <input type="file" class="form-control" name="imagen_url" id="" accept="image/*">

                                            <Strong><label for=""
                                                    class="form-label text-secondary">DESCRIPCION</label></Strong>
                                            <input type="text" class="form-control" name="descripcion "
                                                id="">

                                            <Strong><label for=""
                                                    class="form-label text-secondary">PLACA</label></Strong>
                                            <input type="text" class="form-control" name="placa" id="">

                                            <strong><label for=""
                                                    class="form-label text-secondary">COLOR</label></strong>
                                            <input type="text" class="form-control" name="color" id="">

                                            <Strong><label for=""
                                                    class="form-label text-secondary">CATEGORIA</label></Strong>
                                            <select class="form-select form-control" name="nomCategoria">
                                                <option selected>---</option>
                                                <option value="camion" name="camion">Camion</option>
                                                <option value="camioneta" name="camioneta">Camioneta</option>
                                                <option value="deportivo" name="deportivo">Deportivo</option>
                                                <option value="motos" name="motos">Motos</option>
                                            </select>

                                            <strong><label for=""
                                                    class="form-label text-secondary">ESTADO</label></strong>
                                            <select class="form-select form-control" name="estado">
                                                <option selected>---</option>
                                                <option value="disponible" name="disponible">Disponible</option>
                                                <option value="vendido" name="vendido">Vendido</option>
                                                <option value="reparacion" name="reparacion">Reparacion</option>
                                            </select>
                                            <br>
                                            <button type="submit" name="btnVehiculo" class="btn btn-primary"
                                                style="width: 100%">Agregar</button>
                                        </div>
                                        <div class="col-md-2">

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
        </div>
    </div>

    <!-- main-panel ends -->

    @push('scripts')
        <script>
            let tablaUsuarios;

            $('#mostrar_usuario').on('shown.bs.collapse', function() {
                if (!$.fn.DataTable.isDataTable('#tabla-usuarios')) {
                    tablaUsuarios = $('#tabla-usuarios').DataTable({
                        responsive: true,
                        autoWidth: false,
                        language: {
                            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                        }
                    });
                } else {
                    tablaUsuarios.columns.adjust().responsive.recalc();
                }
            });
        </script>
    @endpush


    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<!-- DataTables CSS y JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --}}



@endsection
