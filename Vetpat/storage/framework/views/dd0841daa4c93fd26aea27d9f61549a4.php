<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenidos a Veterinaria Patitas</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f4f8;
            font-family: 'Roboto', sans-serif;
            overflow: hidden;
            text-align: center;
        }

        .splash-container {
            position: relative;
        }

        .logo {
            display: none;
            /* Logo oculto inicialmente */
            margin-top: 50px;
        }

        .message {
            display: none;
            /* Mensaje oculto inicialmente */
            font-size: 30px;
            color: #333;
            font-weight: 700;
            margin-top: 20px;
        }

        /* Animación de la gota */
        .drop {
            position: absolute;
            width: 120px;
            /* Tamaño aumentado */
            height: 120px;
            /* Tamaño aumentado */
            background-color: #00aaff;
            border-radius: 50%;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0% {
                transform: translateY(0);
            }

            30% {
                transform: translateY(-50px);
            }

            50% {
                transform: translateY(0);
            }

            70% {
                transform: translateY(-25px);
            }

            100% {
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="splash-container">
        <div class="drop"></div>
        <div class="message" id="message">Bienvenidos a la VETERINARIA PATITAS</div>
        <img src="<?php echo e(asset('images/logo/logo_veterinaria.png')); ?>" alt="Logo de Veterinaria Patitas" class="logo"
            id="logo" width="150">
    </div>

    <script>
        // Después de 3 segundos, ocultar la gota y mostrar el mensaje de bienvenida y el logo
        setTimeout(function() {
            document.querySelector('.drop').style.display = 'none'; // Ocultar gota
            document.getElementById('logo').style.display = 'block'; // Mostrar logo
            document.getElementById('message').style.display = 'block'; // Mostrar mensaje
        }, 3000);

        // Después de 5 segundos, redirigir al login
        setTimeout(function() {
            window.location.href = "<?php echo e(route('auth.login')); ?>";
        }, 5000);
    </script>
</body>

</html>
<?php /**PATH C:\Users\VICTUS\Desktop\Proyecto Tecnologia web\Veterinaria\Vetpat\resources\views/splash.blade.php ENDPATH**/ ?>