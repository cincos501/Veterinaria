<!DOCTYPE html>
<html>

<head>
    <title>Lista de Productos</title>
</head>

<body>
    <h1>Lista de Productos Vendidos</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad Vendida</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->cantidad_vendida }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
