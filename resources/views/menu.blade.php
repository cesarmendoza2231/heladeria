@extends('layouts.app')

@section('title', 'Menú de Helados')

@section('content')
<!-- Hero Section -->
<div class="hero-section" style="background-image: url('{{ asset('https://images.pexels.com/photos/31416136/pexels-photo-31416136/free-photo-of-seleccion-de-postres-japoneses-de-matcha-en-kioto.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2') }}');">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Nuestro Menú</h1>
        <p class="lead">Deliciosas opciones para todos los gustos</p>
    </div>
</div>

<!-- Contenido Principal -->
<div class="container py-5">
    <!-- Encabezado con Buscador -->
    <div class="row mb-5">
        <div class="col-md-6">
            <h2 class="fw-bold" style="color: #6a11cb;">Nuestros Helados</h2>
            <p>Explora nuestra variedad de helados artesanales. Cada uno preparado con ingredientes frescos y mucho amor.</p>
        </div>
        <div class="col-md-6 text-md-end">
            <div class="d-flex justify-content-end align-items-center">
                <div class="input-group mb-3 w-75 me-3">
                    <input type="text" class="form-control" placeholder="Buscar helado..." id="buscarHelado">
                    <button class="btn btn-outline-primary" type="button" id="btnBuscar">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Lista de Helados -->
    <div class="row" id="listaHelados">
        @forelse($helados as $helado)
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card helado-card h-100">
                <div class="position-relative">
                    <img src="{{ asset('storage/' . $helado->imagen) }}" class="card-img-top" alt="{{ $helado->nombre }}" style="height: 200px; object-fit: cover;">
                    <div class="position-absolute top-0 end-0 bg-primary text-white px-2 py-1 rounded-bl">
                        ${{ number_format($helado->precio, 2) }}
                    </div>
                    @if($helado->stock <= 0)
                        <div class="position-absolute top-50 start-50 translate-middle bg-danger text-white px-3 py-1 rounded">
                            Agotado
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $helado->nombre }}</h5>
                    <p class="card-text">{{ Str::limit($helado->descripcion, 100) }}</p>
                    <p class="text-muted">
                        <small>Stock: {{ $helado->stock }}</small>
                    </p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <form action="{{ route('carrito.agregar', $helado->id) }}" method="POST">
                        @csrf
                        <div class="input-group mb-2">
                            <input type="number" name="cantidad" value="1" min="1" max="{{ $helado->stock }}" 
                                   class="form-control" {{ $helado->stock <= 0 ? 'disabled' : '' }}>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" {{ $helado->stock <= 0 ? 'disabled' : '' }}>
                            <i class="fas fa-cart-plus me-2"></i>
                            {{ $helado->stock <= 0 ? 'Agotado' : 'Añadir al Carrito' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning">No hay helados disponibles en este momento.</div>
        </div>
        @endforelse
    </div>
</div>

<!-- Botón Flotante del Carrito -->
@auth
<div class="fixed-bottom d-flex justify-content-center mb-4">
    <a href="{{ route('carrito') }}" class="btn btn-primary position-relative shadow-lg" style="padding: 12px 24px; border-radius: 50px;">
        <i class="fas fa-shopping-cart me-2"></i>Ver Carrito
        @if($totalItems > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $totalItems }}
            </span>
        @endif
    </a>
</div>
@endauth

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Búsqueda en tiempo real
    const buscarHelado = document.getElementById('buscarHelado');
    const btnBuscar = document.getElementById('btnBuscar');
    const listaHelados = document.getElementById('listaHelados').children;

    const filtrarHelados = () => {
        const termino = buscarHelado.value.toLowerCase();
        Array.from(listaHelados).forEach(helado => {
            const nombre = helado.querySelector('.card-title')?.textContent.toLowerCase() || '';
            helado.style.display = nombre.includes(termino) ? 'block' : 'none';
        });
    };

    buscarHelado.addEventListener('input', filtrarHelados);
    btnBuscar.addEventListener('click', filtrarHelados);

    // Efectos hover
    const cards = document.querySelectorAll('.helado-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-5px)';
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
        });
    });
});
</script>
@endsection

@section('styles')
<style>
.hero-section {
    background-size: cover;
    background-position: center;
    padding: 100px 0;
    color: white;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
    margin-bottom: 30px;
}

.helado-card {
    transition: all 0.3s ease;
    border: none;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.helado-card:hover {
    box-shadow: 0 10px 20px rgba(0,0,0,0.15);
}

.card-img-top {
    transition: transform 0.3s;
}

.helado-card:hover .card-img-top {
    transform: scale(1.03);
}

.fixed-bottom {
    z-index: 1030;
}

.btn-primary {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    border: none;
}
</style>
@endsection