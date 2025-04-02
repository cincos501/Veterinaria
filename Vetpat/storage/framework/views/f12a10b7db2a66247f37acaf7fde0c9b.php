

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="mb-4">Tienda de Productos</h1>

        <!-- Filtro por categoría -->
        <form method="GET" action="<?php echo e(route('cliente.productos.index')); ?>" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <select name="categoria" class="form-control" onchange="this.form.submit()">
                        <option value="">Todas las categorías</option>
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($categoria); ?>" <?php echo e(request('categoria') == $categoria ? 'selected' : ''); ?>>
                                <?php echo e($categoria); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </form>

        <!-- Mostrar productos -->
        <div class="row">
            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <?php if($producto->imagen): ?>
                            <img src="<?php echo e(asset('storage/imagenes_productos/' . $producto->imagen)); ?>" class="card-img-top"
                                alt="<?php echo e($producto->nombre); ?>"
                                style="height: 200px; object-fit: contain; width: 100%; max-height: 200px;">
                        <?php else: ?>
                            <div class="p-5 text-center">Sin imagen</div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($producto->nombre); ?></h5>
                            <p class="card-text"><?php echo e(Str::limit($producto->descripcion, 100)); ?></p>
                            <p><strong>Bs <?php echo e(number_format($producto->precio, 2)); ?></strong></p>
                            <a href="<?php echo e(route('cliente.productos.show', $producto->id)); ?>" class="btn btn-primary">Ver
                                Detalles</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Paginación -->
        <div class="mt-4">
            <?php echo e($productos->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/cliente/productos/index.blade.php ENDPATH**/ ?>