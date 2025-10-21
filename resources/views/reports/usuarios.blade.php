<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Usuarios</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Reporte de Usuarios</h2>
    <table>
        <thead>
            <tr>
                <th>CI</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $u)
                <tr>
                    <td>{{ $u->persona->ci }}</td>
                    <td>{{ $u->persona->nombre }} {{ $u->persona->paterno }}</td>
                    <td>{{ $u->persona->correo }}</td>
                    <td>{{ $u->persona->telefono }}</td>
                    <td>{{ $u->rol->nombreRol }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
