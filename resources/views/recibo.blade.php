<!DOCTYPE html>
<html>
<head>
    <title>Recibo de Compra</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .logo { max-width: 150px; }
        .table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .table th { background-color: #f2f2f2; }
        .total { font-weight: bold; text-align: right; font-size: 1.2em; }
        .footer { margin-top: 30px; text-align: center; font-size: 0.8em; }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('images/logo.jpg') }}" class="logo" style="max-width: 150px;">
        <h1>Heladería Delicial</h1>
        <p>Calle Principal 123, Ciudad</p>
        <p>Tel: 555-1234 | NIT: 123456789</p>
        <h3>Recibo de Compra #{{ $numero_recibo }}</h3>
        <p>Fecha: {{ $fecha }}</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Helado</th>
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carrito as $item)
            <tr>
                <td>{{ $item['nombre'] }}</td>
                <td>${{ number_format($item['precio'], 2) }}</td>
                <td>{{ $item['cantidad'] }}</td>
                <td>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        <p>TOTAL: ${{ number_format($total, 2) }}</p>
    </div>

    <div class="footer">
        <p>¡Gracias por su compra!</p>
        <p>Este recibo es válido como factura de compra</p>
        <p>Heladería Artesanal © {{ date('Y') }}</p>
    </div>
</body>
</html>