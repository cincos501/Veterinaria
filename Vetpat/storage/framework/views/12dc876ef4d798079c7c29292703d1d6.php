

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="card shadow-sm p-4">
            <h2 class="mb-3">Gestión de Asesoramientos</h2>
            <a href="<?php echo e(route('admin.asesoramiento.create')); ?>" class="btn btn-success mb-3">
                <i class="fas fa-plus"></i> Agregar Asesoramiento
            </a>

            <?php if($asesoramientos->isEmpty()): ?>
                <div class="alert alert-warning">No hay asesoramientos registrados.</div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Título</th>
                                <th>Contenido</th>
                                <th>WhatsApp</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $asesoramientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asesoramiento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($asesoramiento->titulo); ?></td>
                                    <td>
                                        <?php echo e(Str::limit($asesoramiento->contenido, 50)); ?>

                                        <?php if(strlen($asesoramiento->contenido) > 50): ?>
                                            <a href="#" class="text-primary" data-bs-toggle="modal"
                                                data-bs-target="#verMasModal<?php echo e($asesoramiento->id); ?>">Ver más</a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($asesoramiento->contacto_whatsapp): ?>
                                            <a href="https://wa.me/<?php echo e($asesoramiento->contacto_whatsapp); ?>" target="_blank"
                                                class="btn btn-success btn-sm">
                                                <i class="fab fa-whatsapp"></i> Chat
                                            </a>
                                        <?php else: ?>
                                            <span class="text-muted">No disponible</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo e(route('admin.asesoramiento.edit', $asesoramiento->id)); ?>"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <button class="btn btn-danger btn-sm"
                                            onclick="confirmarEliminacion(<?php echo e($asesoramiento->id); ?>)">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                        <form id="delete-form-<?php echo e($asesoramiento->id); ?>"
                                            action="<?php echo e(route('admin.asesoramiento.destroy', $asesoramiento->id)); ?>"
                                            method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal para ver contenido completo -->
                                <div class="modal fade" id="verMasModal<?php echo e($asesoramiento->id); ?>" tabindex="-1"
                                    aria-labelledby="verMasLabel<?php echo e($asesoramiento->id); ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="verMasLabel<?php echo e($asesoramiento->id); ?>">
                                                    <?php echo e($asesoramiento->titulo); ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo e($asesoramiento->contenido); ?>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function confirmarEliminacion(id) {
            if (confirm('¿Estás seguro de que deseas eliminar este asesoramiento?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/asesoramiento/index.blade.php ENDPATH**/ ?>