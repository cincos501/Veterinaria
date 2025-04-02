

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Asesoramiento</h2>

        <?php if($asesoramientos->isEmpty()): ?>
            <div class="alert alert-info text-center">No hay asesoramientos disponibles en este momento.</div>
        <?php else: ?>
            <div class="row">
                <?php $__currentLoopData = $asesoramientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asesoramiento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm rounded h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo e($asesoramiento->titulo); ?></h5>
                                <p class="card-text">
                                    <?php echo e(Str::limit($asesoramiento->contenido, 80)); ?>

                                    <?php if(strlen($asesoramiento->contenido) > 80): ?>
                                        <a href="#" class="text-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalAsesoramiento<?php echo e($asesoramiento->id); ?>">Ver más</a>
                                    <?php endif; ?>
                                </p>

                                <div class="mt-auto text-center">
                                    <?php if($asesoramiento->contacto_whatsapp): ?>
                                        <a href="https://wa.me/<?php echo e($asesoramiento->contacto_whatsapp); ?>" target="_blank"
                                            class="btn btn-success w-100">
                                            <i class="fab fa-whatsapp"></i> Contactar
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted">No disponible</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal para contenido completo -->
                    <div class="modal fade" id="modalAsesoramiento<?php echo e($asesoramiento->id); ?>" tabindex="-1"
                        aria-labelledby="modalLabel<?php echo e($asesoramiento->id); ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel<?php echo e($asesoramiento->id); ?>">
                                        <?php echo e($asesoramiento->titulo); ?>

                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php echo e($asesoramiento->contenido); ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/cliente/asesoramiento/index.blade.php ENDPATH**/ ?>