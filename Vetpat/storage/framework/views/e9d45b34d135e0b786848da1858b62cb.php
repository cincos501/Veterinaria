

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="text-center">Asesoramiento</h2>

        <div class="row">
            <?php $__currentLoopData = $asesoramientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asesoramiento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($asesoramiento->titulo); ?></h5>
                            <p class="card-text"><?php echo e($asesoramiento->contenido); ?></p>

                            <?php if($asesoramiento->contacto_whatsapp): ?>
                                <a href="https://wa.me/<?php echo e($asesoramiento->contacto_whatsapp); ?>" target="_blank"
                                    class="btn btn-success">
                                    Contactar por WhatsApp
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/cliente/asesoramiento/index.blade.php ENDPATH**/ ?>