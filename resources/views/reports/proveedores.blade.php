i<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Proveedores</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Reporte de Proveedores</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>NIT</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proveedores as $p)
                <tr>
                    <td>{{ $p->nombre }}</td>
                    <td>{{ $p->nit }}</td>
                    <td>{{ $p->direccion }}</td>
                    <td>{{ $p->telefono }}</td>
                    <td>{{ $p->correo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
