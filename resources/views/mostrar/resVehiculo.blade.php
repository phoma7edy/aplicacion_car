
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
                <th>Placa</th>
                <th>Color</th>
                <th>Transmision</th>
                <th>Nro de Puertas</th>
                <th>Estado</th>
                {{-- Agrega más campos si tu tabla tiene más --}}
            </tr>
        </thead>
        <tbody>
            @forelse ($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->id }}</td>
                    <td>{{ $vehiculo->placa }}</td>
                    <td>{{ $vehiculo->color }}</td>
                    <td>{{ $vehiculo->transmision }}</td>
                    <td>{{ $vehiculo->nroPuertas }}</td>
                    <td>{{ $vehiculo->estado }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hay vehículos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>
@endsection
