@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <h2 class="fw-bold mb-4">Tu Carrito de Compras</h2>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(count((array) session('carrito')) > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @foreach(session('carrito') as $id => $detalles)
                                @php $total += $detalles['precio'] * $detalles['cantidad'] @endphp
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('images/' . $detalles['imagen']) }}" width="50" class="me-3">
                                            {{ $detalles['nombre'] }}
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" value="{{ $detalles['cantidad'] }}" class="form-control cantidad-carrito" data-id="{{ $id }}" style="width: 60px;">
                                    </td>
                                    <td>${{ number_format($detalles['precio'], 2) }}</td>
                                    <td>${{ number_format($detalles['precio'] * $detalles['cantidad'], 2) }}</td>
                                    <td>
                                       
                                         
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <form action="{{ route('vaciar.carrito') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Vaciar Carrito</button>
                    </form>
                    <a href="{{ route('menu') }}" class="btn btn-outline-primary">Seguir Comprando</a>
                </div>
            @else
                <div class="alert alert-info">
                    Tu carrito está vacío. <a href="{{ route('menu') }}">¡Empieza a comprar!</a>
                </div>
            @endif
        </div>

        @if(count((array) session('carrito')) > 0)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Resumen del Pedido</h5>
                    <hr>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal:</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Envío:</span>
                        <span>$0.00</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold">
                        <span>Total:</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                    <a href="#" class="btn btn-primary w-100 mt-3">Proceder al Pago</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Actualizar cantidad
    $(".cantidad-carrito").change(function() {
        var id = $(this).data("id");
        var cantidad = $(this).val();
        
        $.ajax({
            url: "{{ route('actualizar.carrito') }}",
            method: "PATCH",
            data: {
                _token: '{{ csrf_token() }}', 
                id: id,
                cantidad: cantidad
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });

    // Eliminar producto
    $(".eliminar-carrito").click(function() {
        var id = $(this).data("id");
        if(confirm("¿Estás seguro de eliminar este producto?")) {
            window.location.href = "/eliminar-carrito/" + id;
        }
    });
});
</script>
@endsection