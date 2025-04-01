@extends('layouts.app')

@section('title', 'Menú')

@section('content')
<div class="hero-section" style="background-image: url('{{ asset('images/menu2-bg.jpg') }}');">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Nuestro Menú</h1>
        <p class="lead">Deliciosas opciones para todos los gustos</p>
    </div>
</div>

<div class="container py-5">
    <div class="row mb-5">
        <div class="col-md-6">
            <h2 class="fw-bold" style="color: var(--helado-primary);">Nuestros Helados</h2>
            <p>Explora nuestra variedad de helados artesanales. Cada uno preparado con ingredientes frescos y mucho amor.</p>
        </div>
        <div class="col-md-6 text-md-end">
            <div class="d-flex justify-content-end align-items-center">
                <div class="input-group mb-3 w-75 me-3">
                    <input type="text" class="form-control" placeholder="Buscar helado..." id="buscarHelado">
                    <button class="btn btn-outline-primary" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row" id="listaHelados">
        @foreach($helados as $helado)
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card helado-card h-100">
                <div class="position-relative">
                    <img src="{{ asset('images/' . $helado['imagen']) }}" class="card-img-top" alt="{{ $helado['nombre'] }}">
                    <div class="position-absolute top-0 end-0 bg-primary text-white px-2 py-1 rounded-bl">
                        ${{ number_format($helado['precio'], 2) }}
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $helado['nombre'] }}</h5>
                    <p class="card-text">{{ $helado['descripcion'] }}</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <form action="{{ route('agregar.carrito', $helado['id']) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-helado w-100">
                            <i class="fa fa-shopping-cart"></i> Añadir al carrito
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Carrito flotante en la parte inferior -->
<div class="fixed-bottom d-flex justify-content-center mb-4">
    <a href="{{ route('carrito') }}" class="btn btn-primary position-relative">
        <i class="fa fa-shopping-cart"></i>
        @if(session('carrito'))
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ array_sum(array_column(session('carrito'), 'cantidad')) }}
            </span>
        @endif
    </a>
</div>

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const buscarHelado = document.getElementById('buscarHelado');
    const listaHelados = document.getElementById('listaHelados').children;
    
    buscarHelado.addEventListener('input', function() {
        const termino = this.value.toLowerCase();
        
        Array.from(listaHelados).forEach(helado => {
            const nombre = helado.querySelector('.card-title').textContent.toLowerCase();
            if (nombre.includes(termino)) {
                helado.style.display = 'block';
            } else {
                helado.style.display = 'none';
            }
        });
    });
});
</script>
@endsection

<style>
/* Estilo para el botón del carrito en la parte inferior */
.fixed-bottom {
    z-index: 1000;
    position: fixed;
    bottom: 30px; /* Ajusta la distancia desde la parte inferior si es necesario */
}

.btn-primary {
    font-size: 1.25rem;
    padding: 12px 20px;
    border-radius: 50px;
}
</style>
@endsection