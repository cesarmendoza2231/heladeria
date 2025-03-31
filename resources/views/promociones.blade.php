@extends('layouts.app')

@section('title', 'Promociones')

@section('content')
<div class="hero-section" style="background-image: url('/images/promociones-bg.jpg');">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Promociones Especiales</h1>
        <p class="lead">Aprovecha nuestras increíbles ofertas y combos</p>
    </div>
</div>

<div class="container py-5">
    <div class="row mb-5">
        <div class="col-md-8 mx-auto text-center">
            <h2 class="fw-bold mb-3" style="color: var(--helado-primary);">Ofertas Actuales</h2>
            <p>Disfruta de estos descuentos especiales por tiempo limitado. ¡No te las pierdas!</p>
        </div>
    </div>
    
    <div class="row g-4">
        @foreach($promociones as $promocion)
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">{{ $promocion['nombre'] }}</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $promocion['descripcion'] }}</p>
                    <div class="d-flex align-items-center mt-3">
                        <i class="fa fa-calendar-alt text-muted me-2"></i>
                        <small class="text-muted">Válido hasta: {{ date('d/m/Y', strtotime($promocion['valido_hasta'])) }}</small>
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <button class="btn btn-helado w-100">Aprovechar oferta</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="bg-light py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4" style="color: var(--helado-primary);">¡Síguenos en redes sociales!</h2>
        <p class="lead mb-4">Publicamos promociones exclusivas para nuestros seguidores</p>
        <div class="social-icons justify-content-center">
            <a href="#" class="btn btn-outline-primary btn-lg mx-2"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="#" class="btn btn-outline-primary btn-lg mx-2"><i class="fab fa-instagram"></i> Instagram</a>
            <a href="#" class="btn btn-outline-primary btn-lg mx-2"><i class="fab fa-tiktok"></i> TikTok</a>
        </div>
    </div>
</div>
@endsection