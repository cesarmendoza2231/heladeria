@extends('layouts.app')

@section('title', 'Contacto')

@section('content')
<div class="hero-section" style="background-image: url('https://images.pexels.com/photos/16046784/pexels-photo-16046784/free-photo-of-comida-dulce-cajas-fotografia-de-comida.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Contáctanos</h1>
        <p class="lead">Estamos aquí para responder tus preguntas y escuchar tus sugerencias</p>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-6 mb-5 mb-lg-0">
            <h2 class="fw-bold mb-4" style="color: var(--helado-primary);">Envía un mensaje</h2>
            
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            
            <form id="contactForm" method="POST" action="{{ route('enviar.contacto') }}">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                    @error('nombre')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea class="form-control @error('mensaje') is-invalid @enderror" id="mensaje" name="mensaje" rows="5" required>{{ old('mensaje') }}</textarea>
                    @error('mensaje')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-helado">Enviar mensaje</button>
            </form>
        </div>
        <div class="col-lg-6">
            <h2 class="fw-bold mb-4" style="color: var(--helado-primary);">Información de contacto</h2>
            
            <div class="mb-4">
                <h4><i class="fa fa-map-marker-alt text-primary"></i> Dirección</h4>
                <p>Calle, 123<br>Ciudad 12345</p>
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3450.302438333743!2d-64.74439612505581!3d-21.537090280242417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x940647dfb7a7d803%3A0x9c955b696d54271a!2sUniversidad%20Privada%20Domingo%20Savio!5e1!3m2!1ses!2sbo!4v1742860719443!5m2!1ses!2sbo" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <h4><i class="fa fa-phone text-primary"></i> Teléfono</h4>
                    <p>+1 234</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h4><i class="fa fa-envelope text-primary"></i> Email</h4>
                    <p>info@heladeria.com</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h4><i class="fa fa-clock text-primary"></i> Horario</h4>
                    <p>Lunes - Viernes: 10:00 - 20:00<br>Sábado - Domingo: 11:00 - 22:00</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h4><i class="fa fa-hashtag text-primary"></i> Redes sociales</h4>
                    <div class="social-icons">
                        <a href="#" class="text-dark mx-1"><i class="fab fa-facebook-f fa-lg"></i></a>
                        <a href="#" class="text-dark mx-1"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-dark mx-1"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-dark mx-1"><i class="fab fa-tiktok fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection