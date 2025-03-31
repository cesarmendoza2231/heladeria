@extends('layouts.app')

@section('title', 'Nuestros Sabores')

@section('content')
<div class="hero-section" style="background-image: url('/images/sabores-bg.jpg');">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Nuestros Sabores</h1>
        <p class="lead">Descubre nuestra amplia variedad de sabores artesanales</p>
    </div>
</div>

<div class="container py-5">
    <div class="row mb-5">
        <div class="col-md-8 mx-auto text-center">
            <h2 class="fw-bold mb-3" style="color: var(--helado-primary);">Sabores Disponibles</h2>
            <p>Seleccionamos cuidadosamente los mejores ingredientes para ofrecerte una experiencia única.</p>
        </div>
    </div>
    
    <div class="row mb-5">
        <h3 class="mb-4"><i class="fa fa-check-circle text-success"></i> Sabores Disponibles</h3>
        @foreach($saboresDisponibles as $sabor)
        <div class="col-md-3 col-6 mb-3">
            <div class="p-3 border rounded text-center bg-white shadow-sm">
                <div class="mb-2">
                    <i class="fa fa-ice-cream fa-3x" style="color: var(--helado-primary);"></i>
                </div>
                <h5 class="fw-bold">{{ $sabor['nombre'] }}</h5>
                <div class="d-flex justify-content-center">
                    @for($i = 0; $i < $sabor['popularidad']; $i++)
                    <i class="fa fa-star text-warning"></i>
                    @endfor
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    @if(count($saboresNoDisponibles) > 0)
    <div class="row">
        <h3 class="mb-4"><i class="fa fa-times-circle text-danger"></i> Sabores Agotados</h3>
        @foreach($saboresNoDisponibles as $sabor)
        <div class="col-md-3 col-6 mb-3">
            <div class="p-3 border rounded text-center bg-light">
                <div class="mb-2">
                    <i class="fa fa-ice-cream fa-3x text-muted"></i>
                </div>
                <h5 class="fw-bold text-muted">{{ $sabor['nombre'] }}</h5>
                <span class="badge bg-secondary">Próximamente</span>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

<div class="bg-light py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4" style="color: var(--helado-primary);">¿Quieres sugerir un nuevo sabor?</h2>
        <p class="lead mb-4">¡Nos encantaría escuchar tus ideas para nuevos sabores de helado!</p>
        <a href="{{ route('contacto') }}" class="btn btn-helado btn-lg">
            <i class="fa fa-envelope"></i> Contáctanos
        </a>
    </div>
</div>
@endsection