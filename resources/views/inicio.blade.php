@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="hero-section">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Bienvenidos a Heladería Delicia</h1>
        <p class="lead">Los helados más cremosos y deliciosos de la ciudad</p>
        <a href="{{ route('menu') }}" class="btn btn-helado btn-lg mt-3">
            <i class="fa fa-ice-cream"></i> Ver nuestro menú
        </a>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            <h2 class="fw-bold mb-4" style="color: var(--helado-primary);">Nuestra Historia</h2>
            <p class="lead">Desde 1985, hemos estado creando sonrisas con nuestros helados artesanales.</p>
            <p>Todo comenzó con la receta secreta de la abuela María, que combinaba los ingredientes más frescos con mucho amor. Hoy mantenemos esa tradición usando solo productos naturales y técnicas artesanales.</p>
            <a href="{{ route('contacto') }}" class="btn btn-outline-primary mt-3">Conoce más sobre nosotros</a>
        </div>
        <div class="col-lg-6">
            <img src="images/helado-historia.jpg" alt="Nuestra historia" class="img-fluid rounded shadow">
        </div>
    </div>
</div>

<div class="bg-white py-5">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold" style="color: var(--helado-primary);">Nuestros Helados Destacados</h2>
        <div class="row">
            @foreach($destacados as $helado)
            <div class="col-md-4 mb-4">
                <div class="card helado-card h-100">
                    <img src="/images/{{ $helado['imagen'] }}" class="card-img-top" alt="{{ $helado['nombre'] }}">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $helado['nombre'] }}</h5>
                        <p class="card-text">{{ $helado['descripcion'] }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-primary">${{ number_format($helado['precio'], 2) }}</span>
                            <button class="btn btn-sm btn-helado">Ordenar ahora</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('menu') }}" class="btn btn-helado">Ver menú completo</a>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-md-4 mb-4 mb-md-0 text-center">
            <div class="bg-primary text-white p-4 rounded-circle d-inline-block mb-3">
                <i class="fa fa-leaf fa-3x"></i>
            </div>
            <h4>Ingredientes Naturales</h4>
            <p>Usamos solo frutas frescas, leche de granja y productos 100% naturales sin conservantes.</p>
        </div>
        <div class="col-md-4 mb-4 mb-md-0 text-center">
            <div class="bg-primary text-white p-4 rounded-circle d-inline-block mb-3">
                <i class="fa fa-heart fa-3x"></i>
            </div>
            <h4>Hecho con Amor</h4>
            <p>Cada helado se prepara artesanalmente con la misma pasión que hace 35 años.</p>
        </div>
        <div class="col-md-4 text-center">
            <div class="bg-primary text-white p-4 rounded-circle d-inline-block mb-3">
                <i class="fa fa-award fa-3x"></i>
            </div>
            <h4>Premiados</h4>
            <p>Reconocidos como los mejores helados artesanales de la región por 5 años consecutivos.</p>
        </div>
    </div>
</div>
@endsection