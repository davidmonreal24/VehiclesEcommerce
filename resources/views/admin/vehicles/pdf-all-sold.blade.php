<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Todos los Vehículos Vendidos</title>
</head>
<body>
    <h1>Reporte de Todos los Vehículos Vendidos</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Capacidad</th>
                <th>Color</th>
                <th>Modelo 3D</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($soldVehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->nombre }}</td>
                    <td>{{ $vehicle->tipo }}</td>
                    <td>{{ $vehicle->capacidad }}</td>
                    <td>{{ $vehicle->color }}</td>
                    <td>{{ $vehicle->modelo3d }}</td>
                    <td>{{ $vehicle->precio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
