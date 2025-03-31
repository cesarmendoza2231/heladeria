<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión | Sweet Ice 🍦</title>
    <style>
        /* Fuente divertida y temática */
        @import url('https://fonts.googleapis.com/css2?family=Pacifico&family=Fredoka+One&display=swap');

        /* Fondo con patrón de helados */
        body {
            font-family: 'Fredoka One', cursive;
            background-color: #FFE4B5;
            background-image: url('https://www.transparenttextures.com/patterns/food.png');
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }

        /* Contenedor del login */
        .login-container {
            background: linear-gradient(145deg, #FFC3A0, #FFEBB7);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 380px;
            text-align: center;
            border: 5px solid #FF69B4;
            position: relative;
        }

        /* Helado decorativo en la parte superior */
        .login-container img {
            width: 120px;
            position: absolute;
            top: -60px;
            left: 50%;
            transform: translateX(-50%);
        }

        h2 {
            color: #D72638;
            font-size: 26px;
            margin-top: 50px;
            font-family: 'Pacifico', cursive;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 3px solid #FFA07A;
            border-radius: 15px;
            font-size: 16px;
            background-color: #FFF8DC;
            text-align: center;
        }

        /* Botón con efecto de chispas */
        .btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #FF69B4, #FFA07A);
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s ease-in-out;
            font-weight: bold;
            position: relative;
        }

        .btn:hover {
            background-color: #FF4500;
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(255, 105, 180, 0.8);
        }

        /* Detalles de chispas de colores */
        .btn::before {
            content: "🍦✨";
            position: absolute;
            left: -20px;
        }

        .btn::after {
            content: "✨🍦";
            position: absolute;
            right: -20px;
        }

        /* Enlace de registro */
        .register-link {
            margin-top: 15px;
            font-size: 16px;
        }

        .register-link a {
            color: #D72638;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        /* Decoraciones adicionales */
        .ice-cream-decor {
            position: absolute;
            width: 100px;
        }

        .cone-left {
            left: -50px;
            top: 20%;
        }

        .cone-right {
            right: -50px;
            bottom: 15%;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <img src="https://cdn-icons-png.flaticon.com/512/3163/3163484.png" alt="Helado">
        <h2>Bienvenido a Sweet Ice! 🍦</h2>
        <form action="procesar_login.php" method="POST">
            <input type="text" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit" class="btn">🍨 Iniciar Sesión</button>
        </form>
        <p class="register-link">¿No tienes cuenta? <a href="register.html">Regístrate aquí</a></p>
    </div>

    <!-- Decoraciones de helados -->
    <img src="https://cdn-icons-png.flaticon.com/512/2750/2750923.png" class="ice-cream-decor cone-left">
    <img src="https://cdn-icons-png.flaticon.com/512/2750/2750927.png" class="ice-cream-decor cone-right">
</body>
</html>