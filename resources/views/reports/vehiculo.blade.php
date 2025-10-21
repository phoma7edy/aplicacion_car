<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Vehículos</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Reporte de Vehículos</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Placa</th>
                <th>Color</th>
                <th>Estado</th>
                <th>Categoría</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $v)
                <tr>
                    <td>{{ $v->nombre }}</td>
                    <td>{{ $v->modelo }}</td>
                    <td>{{ $v->marca }}</td>
                    <td>{{ $v->placa }}</td>
                    <td>{{ $v->color }}</td>
                    <td>{{ $v->estado }}</td>
                    <td>{{ $v->nomCategoria ?? $v->categoria->nombre ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
