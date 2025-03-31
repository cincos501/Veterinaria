

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Gestión de Citas</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Servicio</th>
                    <th>Fecha y Hora</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($cita->user->name); ?></td>
                        <td><?php echo e($cita->servicio->nombre); ?></td>
                        <td><?php echo e($cita->fecha_hora); ?></td>
                        <td><?php echo e($cita->estado); ?></td>
                        <td>
                            <form action="<?php echo e(route('admin.citas.update', $cita->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                <select name="estado" class="form-select" onchange="this.form.submit()">
                                    <option value="pendiente" <?php echo e($cita->estado == 'pendiente' ? 'selected' : ''); ?>>Pendiente
                                    </option>
                                    <option value="confirmada" <?php echo e($cita->estado == 'confirmada' ? 'selected' : ''); ?>>
                                        Confirmada</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/citas/index.blade.php ENDPATH**/ ?>