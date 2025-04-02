@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Columna de información del usuario -->
        <div class="col-md-6" id="seccion-datos">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0"><i class="fas fa-user-circle me-2"></i>Mis Datos</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold">Nombre:</div>
                        <div class="col-sm-8">{{ Auth::user()->name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold">Email:</div>
                        <div class="col-sm-8">{{ Auth::user()->email }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold">Teléfono:</div>
                        <div class="col-sm-8">{{ Auth::user()->telefono ?? 'No registrado' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4 fw-bold">Dirección:</div>
                        <div class="col-sm-8">{{ Auth::user()->direccion ?? 'No registrada' }}</div>
                    </div>
                    
                    <button class="btn btn-primary mt-3" id="boton-editar">
                        <i class="fas fa-edit me-2"></i>Editar Perfil
                    </button>
                </div>
            </div>
        </div>

        <!-- Columna de historial de compras -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="fas fa-history me-2"></i>Historial de Compras</h4>
                        <a href="" class="btn btn-sm btn-light">
                            <i class="fas fa-file-pdf me-1"></i>Exportar
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if($compras->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Detalle</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($compras as $compra)
                                    <tr>
                                        <td>{{ $compra->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" type="button" 
                                                    data-bs-toggle="collapse" data-bs-target="#detalle-{{ $compra->id }}">
                                                <i class="fas fa-list"></i> Ver
                                            </button>
                                            <div class="collapse mt-2" id="detalle-{{ $compra->id }}">
                                                <ul class="list-group">
                                                    @foreach($compra->helados as $helado)
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <img src="{{ asset('storage/'.$helado->imagen) }}" 
                                                                 width="40" class="rounded me-2">
                                                            {{ $helado->nombre }}
                                                        </div>
                                                        <span class="badge bg-primary rounded-pill">
                                                            {{ $helado->pivot->cantidad }} x ${{ number_format($helado->pivot->precio_unitario, 2) }}
                                                        </span>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </td>
                                        <td>${{ number_format($compra->total, 2) }}</td>
                                        <td>
                                            <span class="badge bg-{{ $compra->estado == 'completado' ? 'success' : ($compra->estado == 'cancelado' ? 'danger' : 'warning') }}">
                                                {{ ucfirst($compra->estado) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Paginación -->
                        <div class="d-flex justify-content-center mt-3">
                            {{ $compras->links() }}
                        </div>
                    @else
                        <div class="alert alert-warning">
                            <i class="fas fa-info-circle me-2"></i>Aún no has realizado compras.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario de edición (oculto inicialmente) -->
    <div class="row mt-4" id="seccion-edicion" style="display: none;">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Editar Perfil</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('perfil.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                            <small class="text-muted">Contacta al administrador para cambiar tu email</small>
                        </div>
                        
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" name="telefono" value="{{ Auth::user()->telefono }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <textarea class="form-control" name="direccion" rows="3" required>{{ Auth::user()->direccion }}</textarea>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" id="boton-cancelar">
                                <i class="fas fa-times me-2"></i>Cancelar
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-2"></i>Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mostrar/ocultar formulario de edición
    document.getElementById('boton-editar').addEventListener('click', function() {
        document.getElementById('seccion-datos').style.display = 'none';
        document.getElementById('seccion-edicion').style.display = 'block';
        window.scrollTo({
            top: document.getElementById('seccion-edicion').offsetTop,
            behavior: 'smooth'
        });
    });

    document.getElementById('boton-cancelar').addEventListener('click', function() {
        document.getElementById('seccion-edicion').style.display = 'none';
        document.getElementById('seccion-datos').style.display = 'block';
        window.scrollTo({
            top: document.getElementById('seccion-datos').offsetTop,
            behavior: 'smooth'
        });
    });

    // Inicializar tooltips de Bootstrap
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>
@endsection

@section('styles')
<style>
.card {
    border-radius: 10px;
    overflow: hidden;
}

.card-header {
    font-weight: 600;
}

.list-group-item {
    border-left: none;
    border-right: none;
}

.collapse {
    transition: all 0.3s ease;
}

.badge {
    font-size: 0.85em;
    padding: 0.5em 0.75em;
}

.table th {
    background-color: #f8f9fa;
    font-weight: 600;
}

.alert-warning {
    background-color: #fff3cd;
    border-color: #ffeeba;
}

.img-thumbnail {
    max-width: 40px;
    height: auto;
}
</style>
@endsection