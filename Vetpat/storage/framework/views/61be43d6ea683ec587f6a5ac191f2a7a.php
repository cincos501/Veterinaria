

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="text-center text-uppercase font-weight-bold">Mis Citas</h2>

        <div class="text-center mb-4">
            <a href="<?php echo e(route('cliente.citas.create')); ?>" class="btn btn-primary">
                <i class="bi bi-calendar-plus"></i> Crear Nueva Cita
            </a>
        </div>

        <?php if($citas->isEmpty()): ?>
            <div class="alert alert-info text-center">
                <strong>No tienes citas agendadas.</strong>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered" id="citasClienteTable">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Servicio</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="animate__animated animate__fadeIn">
                                <td><?php echo e($cita->id); ?></td>
                                <td><?php echo e($cita->servicio->nombre ?? 'Servicio no disponible'); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($cita->fecha_hora)->format('d/m/Y')); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($cita->fecha_hora)->format('H:i')); ?></td>
                                <td>
                                    <?php if($cita->estado == 'pendiente'): ?>
                                        <span class="badge bg-warning text-dark" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Cita pendiente">
                                            <i class="bi bi-clock"></i> <?php echo e(ucfirst($cita->estado)); ?>

                                        </span>
                                    <?php elseif($cita->estado == 'confirmada'): ?>
                                        <span class="badge bg-success" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Cita confirmada">
                                            <i class="bi bi-check-circle"></i> <?php echo e(ucfirst($cita->estado)); ?>

                                        </span>
                                    <?php elseif($cita->estado == 'cancelada'): ?>
                                        <span class="badge bg-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Cita cancelada">
                                            <i class="bi bi-x-circle"></i> <?php echo e(ucfirst($cita->estado)); ?>

                                        </span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <!-- Scripts de Bootstrap para tooltips -->
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/cliente/citas/index.blade.php ENDPATH**/ ?>