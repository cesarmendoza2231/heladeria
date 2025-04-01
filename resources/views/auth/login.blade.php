<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Helados Artesanales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #FF6B6B;
            --white: rgba(255, 255, 255, 0.9);
            --white-solid: #FFFFFF;
            --black: #000000;
            --gray: rgba(0, 0, 0, 0.5);
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            background-image: url('https://images.unsplash.com/photo-1501443762994-82bd5dace89a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding: 20px;
            color: var(--black);
        }
        
        .login-container {
            max-width: 450px;
            width: 100%;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .login-header {
            padding: 30px;
            text-align: center;
            background: rgba(255, 255, 255, 0.3);
        }
        
        .login-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin: 0;
            color: var(--white-solid);
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }
        
        .login-subtitle {
            font-size: 1rem;
            color: var(--white-solid);
            margin-top: 10px;
            opacity: 0.9;
        }
        
        .login-body {
            padding: 30px;
        }
        
        .form-control {
            background: rgba(255, 255, 255, 0.8);
            border: none;
            border-radius: 10px;
            padding: 15px 20px;
            margin-bottom: 20px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.3);
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
            color: var(--white-solid);
        }
        
        .btn-login {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 15px;
            font-weight: 600;
            width: 100%;
            margin-top: 10px;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .btn-login:hover {
            background: #ff5252;
            transform: translateY(-2px);
        }
        
        .login-footer {
            text-align: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.3);
            font-size: 0.9rem;
        }
        
        .login-link {
            color: var(--white-solid);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .login-link:hover {
            color: var(--primary);
            text-decoration: underline;
        }
        
        .icecream-icon {
            margin-right: 8px;
        }
        
        @media (max-width: 576px) {
            .login-container {
                border-radius: 15px;
            }
            
            .login-header, .login-body {
                padding: 20px;
            }
            
            .login-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1 class="login-title"><i class="fas fa-ice-cream icecream-icon"></i>Helados Delicia</h1>
            <p class="login-subtitle">Ingresa tus credenciales para continuar</p>
        </div>
        
        <div class="login-body">
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="user@gmail.com" required>
                
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                
                <button type="submit" class="btn btn-login">
                    <i class="fas fa-sign-in-alt"></i> INGRESAR
                </button>
            </form>
        </div>
        
        <div class="login-footer">
            <p>¿No tienes cuenta? <a href="{{ route('register') }}" class="login-link">Regístrate aquí</a></p>
            <p><a href="" class="login-link">¿Olvidaste tu contraseña?</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>