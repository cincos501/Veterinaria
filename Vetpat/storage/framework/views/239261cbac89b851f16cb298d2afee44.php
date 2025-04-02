

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="mb-4 text-center"><?php echo e($producto->nombre); ?></h1>

        <div class="row">
            <!-- Imagen del producto -->
            <div class="col-md-6 d-flex justify-content-center">
                <div class="card shadow p-3">
                    <?php if($producto->imagen): ?>
                        <img src="<?php echo e(asset('storage/imagenes_productos/' . $producto->imagen)); ?>" class="img-fluid rounded"
                            alt="<?php echo e($producto->nombre); ?>">
                    <?php else: ?>
                        <div class="p-5 text-center bg-light rounded">Sin imagen</div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Detalles del producto -->
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <p><strong>Descripción:</strong> <?php echo e($producto->descripcion); ?></p>
                    <p><strong>Precio base:</strong> Bs <?php echo e(number_format($producto->precio, 2)); ?></p>
                    <p><strong>Stock disponible:</strong> <?php echo e($producto->stock); ?></p>
                    <p><strong>Categoría:</strong> <?php echo e($producto->categoria); ?></p>

                    <hr>

                    <div class="text-center">
                        <button class="btn btn-success" disabled>Comprar</button>
                        <a href="<?php echo e(route('cliente.productos.index')); ?>" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/cliente/productos/show.blade.php ENDPATH**/ ?>