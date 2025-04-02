<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heladería Delicia - @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .navbar-brand img {
            height: 40px;
        }
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1501443762994-82bd5dace89a');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 30px;
        }
        .helado-card {
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        .helado-card:hover {
            transform: translateY(-5px);
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            margin-top: 50px;
        }
        .sabor-disponible {
            color: green;
        }
        .sabor-no-disponible {
            color: red;
            text-decoration: line-through;
        }
        /* Nuevos estilos para el dropdown de usuario */
        .user-dropdown {
            margin-left: 15px;
        }
        .user-dropdown .dropdown-toggle {
            display: flex;
            align-items: center;
            color: #333;
            text-decoration: none;
        }
        .user-dropdown .dropdown-toggle::after {
            margin-left: 5px;
        }
        .user-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 8px;
            background-color: #4CAF50;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('inicio') }}">
                <i class="fas fa-ice-cream"></i> Heladería Delicia
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inicio') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu') }}">Menú</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sabores') }}">Sabores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('promociones') }}">Promociones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
                    </li>
                </ul>
                
                <div class="d-flex align-items-center">
                    @auth
                    <div class="dropdown user-dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-avatar">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('perfil.edit') }}"><i class="fas fa-user-circle me-2"></i>Mi Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="px-3 py-2">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0 text-decoration-none w-100 text-start">
                                        <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main>
        @yield('content')
        @yield('scripts')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <p class="mb-0">&copy; {{ date('Y') }} Heladería Delicia. Todos los derechos reservados.</p>
            <div class="social-icons mt-2">
                <a href="#" class="text-dark mx-2"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-dark mx-2"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-dark mx-2"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </footer>

    <!-- Script para bloquear navegación -->
    @auth
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        window.onpageshow = function(event) {
            if (event.persisted) {
                window.location.reload();
            }
        };

        history.pushState(null, null, location.href);
        window.onpopstate = function(event) {
            history.go(1);
            window.location.href = "{{ route('inicio') }}";
        };
        
        setTimeout(function(){
            if (performance.navigation.type === 2) {
                window.location.reload();
            }
        }, 1000);
    });
    </script>
    @endauth
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>