

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="text-center">Bienvenido, <?php echo e(Auth::user()->name); ?></h2>
        <p class="text-center">Gestiona la información de tus mascotas y agenda tus servicios fácilmente.</p>

        <!-- Sección de perfil -->
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <img src="<?php echo e(asset('images/default-user.png')); ?>" class="rounded-circle mb-3" width="80">
                        <h5 class="card-title"><?php echo e(Auth::user()->name); ?></h5>
                        <p class="card-text"><strong>Email:</strong> <?php echo e(Auth::user()->email); ?></p>
                        <p class="card-text"><strong>Teléfono:</strong> <?php echo e($cliente->telefono ?? 'No registrado'); ?></p>
                        <p class="card-text"><strong>Dirección:</strong> <?php echo e($cliente->direccion ?? 'No registrada'); ?></p>
                        <a href="<?php echo e(route('cliente.perfil')); ?>" class="btn btn-outline-primary">Editar Perfil</a>
                    </div>
                </div>
            </div>

            <!-- Sección de Mascotas -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-info text-white">
                        <h5>Tus Mascotas</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Firulais</strong> (Perro)
                                <a href="#" class="btn btn-sm btn-info">Historial</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Michi</strong> (Gato)
                                <a href="#" class="btn btn-sm btn-info">Historial</a>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-info mt-3">Registrar Mascota</a>
                    </div>
                </div>
            </div>

            <!-- Sección de Citas Pendientes -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h5>Próximas Citas</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Firulais</strong> - 10/04/2025 a las 15:00
                            </li>
                            <li class="list-group-item">
                                <strong>Michi</strong> - 12/04/2025 a las 10:00
                            </li>
                        </ul>
                        <a href="#" class="btn btn-success mt-3">Agendar Cita</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Recomendaciones y Promociones -->
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-warning text-white">
                        <h5>Recomendaciones</h5>
                    </div>
                    <div class="card-body">
                        <p>Consulta consejos personalizados para el cuidado de tu mascota.</p>
                        <a href="#" class="btn btn-warning">Ver Consejos</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5>Promociones Especiales</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Descuento en Servicios de Esterilización</strong> - 20% de descuento en
                                esterilizaciones para mascotas.
                            </li>
                            <li class="list-group-item">
                                <strong>Consulta Gratis</strong> - Primera consulta gratuita para nuevos clientes.
                            </li>
                        </ul>
                        <a href="#" class="btn btn-primary mt-3">Ver Todas las Promociones</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/cliente/dashboard.blade.php ENDPATH**/ ?>