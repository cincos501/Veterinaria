<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura - Compra #{{ $compra->id }}</title>
</head>

<body>
    <h1>Factura de Compra</h1>
    <p><strong>Cliente:</strong> {{ $cliente->nombre }}</p>
    <p><strong>Email:</strong> {{ $cliente->email }}</p>
    <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
    <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>

    <h3>Detalles de la Compra</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compra->productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->pivot->cantidad }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->pivot->cantidad * $producto->precio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total: {{ $compra->total }}</h3>
    <p><strong>Estado:</strong> {{ $compra->estado }}</p>
</body>

</html>
