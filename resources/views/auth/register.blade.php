<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Helados Delicia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4CAF50; /* Verde para combinar con el éxito de registro */
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
            background-image: url('https://images.unsplash.com/photo-1551024506-0bccd828d307?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding: 20px;
            color: var(--black);
        }
        
        .register-container {
            max-width: 500px;
            width: 100%;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .register-header {
            padding: 30px;
            text-align: center;
            background: rgba(76, 175, 80, 0.3); /* Verde semi-transparente */
        }
        
        .register-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin: 0;
            color: var(--white-solid);
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }
        
        .register-subtitle {
            font-size: 1rem;
            color: var(--white-solid);
            margin-top: 10px;
            opacity: 0.9;
        }
        
        .register-body {
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
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.3);
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
            color: var(--white-solid);
        }
        
        .btn-register {
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
        
        .btn-register:hover {
            background: #43A047;
            transform: translateY(-2px);
        }
        
        .register-footer {
            text-align: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.3);
            font-size: 0.9rem;
        }
        
        .register-link {
            color: var(--white-solid);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .register-link:hover {
            color: var(--primary);
            text-decoration: underline;
        }
        
        .icecream-icon {
            margin-right: 8px;
        }
        
        .password-strength {
            height: 5px;
            background: #e0e0e0;
            border-radius: 5px;
            margin-top: -15px;
            margin-bottom: 15px;
            overflow: hidden;
        }
        
        .strength-bar {
            height: 100%;
            width: 0;
            transition: width 0.3s;
        }
        
        @media (max-width: 576px) {
            .register-container {
                border-radius: 15px;
            }
            
            .register-header, .register-body {
                padding: 20px;
            }
            
            .register-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h1 class="register-title"><i class="fas fa-ice-cream icecream-icon"></i>Crear Cuenta</h1>
            <p class="register-subtitle">Únete a nuestra comunidad de helados artesanales</p>
        </div>
        
        <div class="register-body">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <label for="name" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Juan Pérez" required>
                
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="tu@email.com" required>
                
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required oninput="checkPasswordStrength(this.value)">
                <div class="password-strength">
                    <div class="strength-bar" id="strengthBar"></div>
                </div>
                
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
                <label for="telefono" class="form-label">Teléfono</label>
    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="+51 987654321" required>

    <label for="direccion" class="form-label">Dirección</label>
    <textarea class="form-control" id="direccion" name="direccion" rows="2" placeholder="Av. Principal 123" required></textarea>
                <button type="submit" class="btn btn-register">
                    <i class="fas fa-user-check"></i> REGISTRARSE
                </button>
            </form>
        </div>
        
        <div class="register-footer">
            <p>¿Ya tienes cuenta? <a href="{{ route('login') }}" class="register-link">Inicia Sesión</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function checkPasswordStrength(password) {
            const strengthBar = document.getElementById('strengthBar');
            let strength = 0;
            
            // Evaluar fortaleza de la contraseña
            if (password.length > 0) strength += 1;
            if (password.length >= 8) strength += 1;
            if (/[A-Z]/.test(password)) strength += 1;
            if (/[0-9]/.test(password)) strength += 1;
            if (/[^A-Za-z0-9]/.test(password)) strength += 1;
            
            // Actualizar barra de progreso
            const width = (strength / 5) * 100;
            strengthBar.style.width = width + '%';
            
            // Cambiar color según fortaleza
            if (strength <= 2) {
                strengthBar.style.backgroundColor = '#ff5252';
            } else if (strength <= 4) {
                strengthBar.style.backgroundColor = '#ffc107';
            } else {
                strengthBar.style.backgroundColor = '#4CAF50';
            }
        }
    </script>
</body>
</html>