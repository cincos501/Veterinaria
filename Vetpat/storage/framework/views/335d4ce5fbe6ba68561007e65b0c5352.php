

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="text-center mb-5">Servicios Disponibles</h2>
        <div class="row">
            <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4">
                    <div
                        class="card shadow-sm border-0 rounded-lg transition-all transform hover:scale-105 hover:shadow-lg hover:bg-light">
                        <img src="<?php echo e(asset('storage/images/' . $servicio->imagen)); ?>" class="card-img-top rounded-top"
                            alt="<?php echo e($servicio->nombre); ?>"
                            style="height: 200px; object-fit: cover; transition: transform 0.3s;">
                        <div class="card-body text-center">
                            <h5 class="card-title text-uppercase font-weight-bold"><?php echo e($servicio->nombre); ?></h5>
                            <p class="card-text text-muted mb-3"><?php echo e(Str::limit($servicio->descripcion, 100)); ?></p>
                            <p class="card-text font-weight-bold text-dark">Bs <?php echo e(number_format($servicio->precio, 2)); ?></p>

                            <!-- Mostrar promoción si existe -->
                            <?php if($servicio->promocion): ?>
                                <p class="text-success font-weight-bold mt-2">¡En promoción! -50%</p>
                            <?php endif; ?>

                            <a href="<?php echo e(route('cliente.servicios.show', $servicio->id)); ?>"
                                class="btn btn-primary mt-2 w-100 py-2 font-weight-bold transition-all transform hover:bg-primary-500 hover:scale-110">
                                Ver detalles
                            </a>
                            <a href="<?php echo e(route('cliente.citas.index', ['servicio_id' => $servicio->id])); ?>"
                                class="btn btn-success mt-2 w-100 py-2 font-weight-bold transition-all transform hover:bg-success-500 hover:scale-110">
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