<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticación - Veterinaria Patitas</title>

    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Fondo general de la página */
        body {
            background-color: #c4dffa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        /* Contenedor de autenticación con fondo de imagen */
        .auth-container {
            background: url('<?php echo e(asset('images/login/fondo_login1.jpg')); ?>') no-repeat center center;
            background-size: cover;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            position: relative;
        }

        /* Capa de color sobre la imagen para mejorar la legibilidad */
        .auth-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 10px;
        }

        /* Asegurar que el contenido esté encima de la capa de color */
        .auth-content {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <div class="auth-content">
            <?php echo $__env->yieldContent('content'); ?> <!-- Aquí se inyectará el contenido del login o registro -->
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH C:\Users\VICTUS\Desktop\Proyecto Tecnologia web\Veterinaria\Vetpat\resources\views/layouts/auth.blade.php ENDPATH**/ ?>