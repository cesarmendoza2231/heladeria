@extends('layouts.app')

@section('title', 'Tu Carrito')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 fw-bold">🛒 Tu Carrito</h2>
    
    @if(empty($carrito))
        <div class="alert alert-info">
            Tu carrito está vacío. <a href="{{ route('menu') }}">¡Explora nuestros helados!</a>
        </div>
    @else
        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Imagen</th>
                        <th>Helado</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carrito as $id => $item)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $item['imagen']) }}" 
                                 width="60" 
                                 class="rounded"
                                 alt="{{ $item['nombre'] }}">
                        </td>
                        <td>{{ $item['nombre'] }}</td>
                        <td>${{ number_format($item['precio'], 2) }}</td>
                        <td>{{ $item['cantidad'] }}</td>
                        <td>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>
                        <td>
                            <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="{{ route('menu') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>Seguir Comprando
            </a>
            
            <div class="text-end">
                <h4 class="mb-3">Total: <span class="text-primary">${{ number_format($total, 2) }}</span></h4>
                <a href="#" class="btn btn-primary btn-lg">
                    <i class="fas fa-credit-card me-2"></i>Pagar Ahora
                </a>
            </div>
        </div>
    @endif
</div>
@endsection