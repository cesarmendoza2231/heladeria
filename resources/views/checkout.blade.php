@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <h2><i class="fas fa-credit-card me-2"></i>Confirmación de Compra</h2>
            
            <!-- Resumen del carrito -->
            @include('partials.carrito-resumen')
        </div>
        
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total a Pagar</h5>
                    <h4 class="text-success">${{ number_format($total, 2) }}</h4>
                    
                    <form action="{{ route('checkout.procesar') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success w-100 mt-3">
                            <i class="fas fa-lock me-2"></i>Pagar Ahora
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection