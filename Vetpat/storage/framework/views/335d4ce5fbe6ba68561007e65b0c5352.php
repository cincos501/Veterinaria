

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="text-center">Servicios Disponibles</h2>
        <div class="row">
            <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo e(asset('storage/images/' . $servicio->imagen)); ?>" class="card-img-top"
                            alt="<?php echo e($servicio->nombre); ?>" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($servicio->nombre); ?></h5>
                            <p class="card-text"><?php echo e($servicio->descripcion); ?></p>
                            <p class="card-text"><strong>Bs <?php echo e($servicio->precio); ?></strong></p>
                            <a href="<?php echo e(route('cliente.servicios.show', $servicio->id)); ?>" class="btn btn-primary">
                                Ver detalles
                            </a>
                            <a href="<?php echo e(route('cliente.citas.index', ['servicio_id' => $servicio->id])); ?>"
                                class="btn btn-success">
                                Agendar Cita
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/cliente/servicios/index.blade.php ENDPATH**/ ?>