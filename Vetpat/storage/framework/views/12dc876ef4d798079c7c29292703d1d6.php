

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="mb-3">Gestión de Asesoramientos</h2>
        <a href="<?php echo e(route('admin.asesoramiento.create')); ?>" class="btn btn-success mb-3">Agregar Asesoramiento</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>WhatsApp</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $asesoramientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asesoramiento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($asesoramiento->titulo); ?></td>
                        <td><?php echo e(Str::limit($asesoramiento->contenido, 50)); ?></td>
                        <td><?php echo e($asesoramiento->contacto_whatsapp ?? 'No disponible'); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.asesoramiento.edit', $asesoramiento->id)); ?>"
                                class="btn btn-warning">Editar</a>
                            <form action="<?php echo e(route('admin.asesoramiento.destroy', $asesoramiento->id)); ?>" method="POST"
                                style="display:inline;">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/asesoramiento/index.blade.php ENDPATH**/ ?>