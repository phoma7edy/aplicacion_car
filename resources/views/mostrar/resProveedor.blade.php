
@extends('layouts.app') {{-- O tu layout base --}}

@section('contentAdmin')

<div class="container">
<br><br><br><br>
<h1 class="text-primary">MOSTRANDO REGISTROS</h1>

    <div class="container table-responsive ">
        <h2 class="text-secondary">Lista de Proveedores</h2>
        <table class="table table-dark table-hover">
            <thead class="">
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>NIT</th>
                    <th>TELEFONO</th>
                    <th>CORREO</th>
                    {{-- Agrega más campos si tu tabla tiene más --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->id }}</td>
                        <td>{{ $proveedor->nombre }}</td>
                        <td>{{ $proveedor->nit }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td>{{ $proveedor->correo }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay proveedores registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
