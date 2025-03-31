

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="mb-4">Lista de Productos</h1>

        <!-- Formulario de filtrado por categoría -->
        <form method="GET" action="<?php echo e(route('admin.productos.index')); ?>" class="mb-3">
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

        <a href="<?php echo e(route('admin.productos.create')); ?>" class="btn btn-primary mb-3">Agregar Producto</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php if($producto->imagen): ?>
                                <img src="<?php echo e(asset('storage/imagenes_productos/' . $producto->imagen)); ?>"
                                    alt="<?php echo e($producto->nombre); ?>" width="50">
                            <?php else: ?>
                                <span>Sin imagen</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($producto->nombre); ?></td>
                        <td><?php echo e($producto->descripcion); ?></td>
                        <td>Bs <?php echo e(number_format($producto->precio, 2)); ?></td>
                        <td><?php echo e($producto->stock); ?></td>
                        <td><?php echo e($producto->categoria); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.productos.edit', $producto->id)); ?>"
                                class="btn btn-warning btn-sm">Editar</a>
                            <form action="<?php echo e(route('admin.productos.destroy', $producto->id)); ?>" method="POST"
                                style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/productos/index.blade.php ENDPATH**/ ?>