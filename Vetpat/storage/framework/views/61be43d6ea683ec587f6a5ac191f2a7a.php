

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="text-center">Mis Citas</h2>

        <div class="text-center mb-4">
            <a href="<?php echo e(route('cliente.citas.create')); ?>" class="btn btn-primary">Crear Nueva Cita</a>
        </div>

        <?php if($citas->isEmpty()): ?>
            <p>No tienes citas agendadas.</p>
        <?php else: ?>
            <table class="table table-bordered">
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
                        <tr>
                            <td><?php echo e($cita->id); ?></td>
                            <td><?php echo e($cita->servicio->nombre ?? 'Servicio no disponible'); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($cita->fecha_hora)->format('d/m/Y')); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($cita->fecha_hora)->format('H:i')); ?></td>
                            <td><?php echo e($cita->estado); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/cliente/citas/index.blade.php ENDPATH**/ ?>