

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="mb-4 text-center">Gestión de Servicios</h2>
        <a href="<?php echo e(route('admin.servicios.create')); ?>" class="btn btn-primary mb-3">Agregar Servicio</a>

        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Filtro de búsqueda -->
        <div class="mb-3">
            <form action="<?php echo e(route('admin.servicios.index')); ?>" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Buscar servicio..."
                    value="<?php echo e(request('search')); ?>">
            </form>
        </div>

        <!-- Tabla de Servicios -->
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
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
                                    <img src="<?php echo e(asset('storage/images/' . $servicio->imagen)); ?>"
                                        alt="Imagen del servicio: <?php echo e($servicio->nombre); ?>" class="img-fluid"
                                        style="max-width: 100px;">
                                <?php else: ?>
                                    No disponible
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($servicio->nombre); ?></td>
                            <td><?php echo e(Str::limit($servicio->descripcion, 50)); ?></td>
                            <td>Bs <?php echo e(number_format($servicio->precio, 2)); ?></td>
                            <td><?php echo e($servicio->requisitos ?? 'No disponible'); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.servicios.edit', $servicio->id)); ?>"
                                    class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <!-- Modal de Confirmación para Eliminar -->
                                <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDelete<?php echo e($servicio->id); ?>"
                                    class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="confirmDelete<?php echo e($servicio->id); ?>" tabindex="-1"
                                    aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmDeleteLabel">Confirmar eliminación</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Estás seguro de eliminar este servicio?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancelar</button>
                                                <form action="<?php echo e(route('admin.servicios.destroy', $servicio->id)); ?>"
                                                    method="POST">
                                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-3">
            <?php echo e($servicios->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/servicios/index.blade.php ENDPATH**/ ?>