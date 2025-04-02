<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente - Veterinaria Patitas</title>

    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome (para íconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        /* Hacer que el footer se mantenga abajo */
        html,
        body {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .content-wrapper {
            flex-grow: 1;
        }

        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: auto;
        }

        /* Barra de navegación */
        .navbar-nav .nav-link {
            color: #ffffff !important;
            transition: 0.3s;
        }

        /* Hover: Cambia el color de los botones en la barra de navegación */
        .navbar-nav .nav-link:hover {
            background-color: #f8b400;
            border-radius: 5px;
            color: #000 !important;
        }

        /* Iconos en la barra de navegación */
        .navbar-nav .nav-link i {
            margin-right: 8px;
        }

        /* Estilos para los enlaces del footer */
        .footer-links a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 10px;
            transition: 0.3s;
        }

        /* Hover en enlaces del footer */
        .footer-links a:hover {
            color: #f8b400;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo e(route('cliente.dashboard')); ?>">
                <i class="fa-solid fa-paw"></i> Veterinaria Patitas
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('cliente.servicios.index')); ?>">
                            <i class="fa-solid fa-stethoscope"></i> Servicios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('cliente.citas.index')); ?>">
                            <i class="fa-solid fa-calendar-check"></i> Citas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('cliente.productos.index')); ?>">
                            <i class="fa-solid fa-box"></i> Productos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('cliente.asesoramiento.index')); ?>">
                            <i class="fa-solid fa-comments"></i> Asesoramiento
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php if(auth()->guard()->check()): ?>
                            <form action="<?php echo e(route('auth.logout')); ?>" method="POST" class="d-flex">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-outline-light">
                                    <i class="fa-solid fa-sign-out-alt"></i> Cerrar sesión
                                </button>
                            </form>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-4 content-wrapper">
        <?php echo $__env->yieldContent('content'); ?> <!-- Aquí se inyectará el contenido de cada página -->
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; <?php echo e(date('Y')); ?> Veterinaria Patitas. Todos los derechos reservados.</p>

        <!-- Dirección y enlace a Google Maps -->
        <p>
            <i class="fa-solid fa-map-marker-alt"></i> Dirección:
            <a href="https://maps.google.com/?q=-16.5039,-68.1328" target="_blank" class="footer-links">
                Calle Falsa 123, La Paz, Bolivia
            </a>
        </p>

        <!-- Redes sociales -->
        <div class="footer-links">
            <a href="https://facebook.com/veterinariapatitas" target="_blank">
                <i class="fa-brands fa-facebook"></i> Facebook
            </a>
            <a href="https://instagram.com/veterinariapatitas" target="_blank">
                <i class="fa-brands fa-instagram"></i> Instagram
            </a>
            <a href="https://wa.me/59161234567" target="_blank">
                <i class="fa-brands fa-whatsapp"></i> WhatsApp
            </a>
        </div>
    </footer>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/layouts/cliente.blade.php ENDPATH**/ ?>