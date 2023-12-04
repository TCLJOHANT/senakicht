<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- factura.blade.php -->

<h1>Factura</h1>

<p>Número de pedido: {{ $venta->order_number }}</p>

<p>Total: {{ $venta->price_total }}</p>

<h2>Detalles de la venta:</h2>
<table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($venta->carts as $detalle)
        <tr>
            <td>{{ $detalle->name_product}}</td>
            <td>{{ $detalle->quantity }}</td>
            <td>{{ $detalle->price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>