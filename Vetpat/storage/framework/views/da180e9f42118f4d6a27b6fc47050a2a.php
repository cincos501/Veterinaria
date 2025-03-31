

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="mb-4">Gestión de Servicios</h2>
        <a href="<?php echo e(route('admin.servicios.create')); ?>" class="btn btn-success mb-3">Agregar Servicio</a>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Requisitos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php if($servicio->imagen): ?>
                                <img src="<?php echo e(asset('storage/images/' . $servicio->imagen)); ?>" alt="Imagen del servicio"
                                    width="100">
                            <?php else: ?>
                                No disponible
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($servicio->nombre); ?></td>
                        <td><?php echo e($servicio->descripcion); ?></td>
                        <td>Bs <?php echo e($servicio->precio); ?></td>
                        <td><?php echo e($servicio->requisitos ?? 'No disponible'); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.servicios.edit', $servicio->id)); ?>" class="btn btn-warning">Editar</a>
                            <form action="<?php echo e(route('admin.servicios.destroy', $servicio->id)); ?>" method="POST"
                                style="display:inline;">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Estás seguro de eliminar este servicio?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/servicios/index.blade.php ENDPATH**/ ?>