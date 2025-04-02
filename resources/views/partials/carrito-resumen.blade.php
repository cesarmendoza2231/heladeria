<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">Resumen de tu Pedido</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->helado->nombre }}</td>
                    <td>{{ $item->cantidad }}</td>
                    <td>${{ number_format($item->precio_unitario * $item->cantidad, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>