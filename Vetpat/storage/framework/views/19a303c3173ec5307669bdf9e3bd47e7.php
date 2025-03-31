

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="text-center"><?php echo e($servicio->nombre); ?></h2>
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo e(asset('storage/images/' . $servicio->imagen)); ?>" class="img-fluid" alt="<?php echo e($servicio->nombre); ?>">
            </div>
            <div class="col-md-6">
                <h4>Descripción</h4>
                <p><?php echo e($servicio->descripcion); ?></p>

                <h4>Requisitos</h4>
                <p><?php echo e($servicio->requisitos ?? 'No hay requisitos disponibles.'); ?></p>

                <a href="<?php echo e(route('cliente.citas.index')); ?>" class="btn btn-success">Agendar cita</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/cliente/servicios/show.blade.php ENDPATH**/ ?>