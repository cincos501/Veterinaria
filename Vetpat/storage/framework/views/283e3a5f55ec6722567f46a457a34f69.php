<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Veterinaria</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo e(route('admin.dashboard')); ?>">Veterinaria Patitas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('admin.servicios.index')); ?>">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('admin.citas.index')); ?>">Citas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('admin.productos.index')); ?>">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('admin.asesoramiento.index')); ?>">Asesoramiento</a>
                    </li>
                </ul>

                <!-- Botón de cerrar sesión -->
                <?php if(auth()->guard()->check()): ?>
                    <form action="<?php echo e(route('auth.logout')); ?>" method="POST" class="d-flex ms-auto">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-outline-light">Cerrar sesión</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-4">
        <?php echo $__env->yieldContent('content'); ?> <!-- Aquí se inyectará el contenido de cada página -->
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-4 p-3 text-center">
        <p>&copy; <?php echo e(date('Y')); ?> Veterinaria Patitas. Todos los derechos reservados.</p>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/layouts/admin.blade.php ENDPATH**/ ?>