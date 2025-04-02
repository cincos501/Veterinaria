

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Bienvenido al Panel de Administrador</h1>
        <p class="text-center mb-5">Gestiona los servicios, citas, productos y asesoramiento para tus clientes.</p>

        <!-- Fila de estadísticas -->
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Servicios Disponibles</h5>
                        <h3 class="card-text"><?php echo e($serviciosCount); ?></h3>
                        <a href="<?php echo e(route('admin.servicios.index')); ?>" class="btn btn-light">Ver Servicios</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Citas Agendadas</h5>
                        <h3 class="card-text"><?php echo e($citasCount); ?></h3>
                        <a href="<?php echo e(route('admin.citas.index')); ?>" class="btn btn-light">Ver Citas</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Asesoramiento</h5>
                        <h3 class="card-text"><?php echo e($asesoramientosCount); ?></h3>
                        <a href="<?php echo e(route('admin.asesoramiento.index')); ?>" class="btn btn-light">Ver Asesoramiento</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Citas Programadas para Hoy -->
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Citas Agendadas para Hoy</h5>
                    <?php if($citasHoy->isEmpty()): ?>
                        <p>No hay citas programadas para hoy.</p>
                    <?php else: ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Servicio</th>
                                    <th>Fecha y Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $citasHoy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($cita->user->name); ?></td>
                                        <td><?php echo e($cita->servicio->nombre); ?></td>
                                        <td><?php echo e($cita->fecha_hora); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Gráfica de Servicios Más Solicitados -->
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Servicios Más Solicitados</h5>
                    <div style="max-height: 300px; width: 100%;">
                        <canvas id="graficoServicios"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gestión de Roles -->
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gestión de Roles</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol Actual</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($usuario->name); ?></td>
                                    <td><?php echo e($usuario->email); ?></td>
                                    <td><?php echo e($usuario->rol); ?></td>
                                    <td>
                                        <form action="<?php echo e(route('admin.usuario.asignarRol', $usuario->id)); ?>"
                                            method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <button type="submit" class="btn btn-warning btn-sm">Asignar Rol Admin</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Agregar Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('graficoServicios').getContext('2d');

            var chartData = {
                labels: <?php echo json_encode($serviciosSolicitados->pluck('nombre'), 15, 512) ?>,
                datasets: [{
                    label: 'Número de Solicitudes',
                    data: <?php echo json_encode($serviciosSolicitados->pluck('total_solicitado'), 15, 512) ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            };

            new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    responsive: true,
                    maintainAspectRatio: true, // Mantiene la relación de aspecto
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>