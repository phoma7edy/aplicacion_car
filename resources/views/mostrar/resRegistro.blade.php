
@extends('layouts.app') {{-- O tu layout base --}}

@section('contentAdmin')

<div class="container">
<br><br><br><br>
<h1 class="text-primary">MOSTRANDO REGISTROS</h1>

<div class="container table-responsive ">
    <h2 class="text-secondary">Lista de Vehículos</h2>
    <table class="table table-dark table-hover">
        <thead class="">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>PATERNO</th>
                <th>MATERNO</th>
                <th>CI</th>
                <th>GENERO</th>
                <th>CORREO</th>
                <th>TELEFONO</th>
                <th>FECHA DE REGISTRO</th>
                {{-- Agrega más campos si tu tabla tiene más --}}
            </tr>
        </thead>
        <tbody>
            @forelse ($personas as $persona)
                <tr>
                    <td>{{ $persona->id }}</td>
                    <td>{{ $persona->nombre }}</td>
                    <td>{{ $persona->paterno }}</td>
                    <td>{{ $persona->materno }}</td>
                    <td>{{ $persona->ci }}</td>
                    <td>{{ $persona->genero }}</td>
                    <td>{{ $persona->correo }}</td>
                    <td>{{ $persona->telefono }}</td>
                    <td>{{ $persona->fechaRegistro }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hay personas registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>
@endsection
