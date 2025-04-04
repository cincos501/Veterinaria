

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Lista de Servicios</h1>

        <form method="GET" action="<?php echo e(route('admin.servicios.index')); ?>" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Buscar por nombre o descripción"
                        value="<?php echo e(request('search')); ?>">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>

        <div class="d-flex justify-content-between mb-3">
            <a href="<?php echo e(route('admin.servicios.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Agregar Servicio
            </a>
        </div>

        <!-- Tabla de servicios -->
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Requisitos</th>
                        <th>En Promoción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php if($servicio->imagen): ?>
                                    <img src="<?php echo e(asset('storage/images/' . $servicio->imagen)); ?>"
                                        alt="<?php echo e($servicio->nombre); ?>" width="50">
                                <?php else: ?>
                                    <span>Sin imagen</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($servicio->nombre); ?></td>
                            <td><?php echo e($servicio->descripcion); ?></td>
                            <td>Bs <?php echo e(number_format($servicio->precio, 2)); ?></td>
                            <td><?php echo e($servicio->requisitos ?? 'No tiene'); ?></td>
                            <td>
                                <form action="<?php echo e(route('admin.servicios.togglePromocion', $servicio->id)); ?>" method="POST"
                                    style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <button type="submit"
                                        class="btn btn-sm <?php echo e($servicio->promocion ? 'btn-success' : 'btn-secondary'); ?>">
                                        <?php echo e($servicio->promocion ? 'Sí' : 'No'); ?>

                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="<?php echo e(route('admin.servicios.edit', $servicio->id)); ?>"
                                    class="btn btn-sm btn-warning">Editar</a>
                                <form action="<?php echo e(route('admin.servicios.destroy', $servicio->id)); ?>" method="POST"
                                    style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <?php echo e($servicios->links()); ?> <!-- Paginación -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/servicios/index.blade.php ENDPATH**/ ?>