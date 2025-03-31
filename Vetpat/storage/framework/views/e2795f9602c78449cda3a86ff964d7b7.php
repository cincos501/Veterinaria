

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="mb-4">Editar Producto</h1>

        <form action="<?php echo e(route('admin.productos.update', $producto->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo e($producto->nombre); ?>" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3" required><?php echo e($producto->descripcion); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio (Bs)</label>
                <input type="number" name="precio" class="form-control" step="0.01" value="<?php echo e($producto->precio); ?>"
                    required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" value="<?php echo e($producto->stock); ?>" required>
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <select name="categoria" class="form-control" required>
                    <?php $__currentLoopData = ['Medicamentos', 'Higiene y Cuidado', 'Alimentos y Suplementos', 'Cuidado y Alojamiento', 'Juguete']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($categoria); ?>" <?php echo e($producto->categoria == $categoria ? 'selected' : ''); ?>>
                            <?php echo e($categoria); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" name="imagen" class="form-control">
                <?php if($producto->imagen): ?>
                    <p class="mt-2">Imagen actual:</p>
                    <img src="<?php echo e(asset('storage/imagenes_productos/' . $producto->imagen)); ?>" alt="<?php echo e($producto->nombre); ?>"
                        width="100">
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-success">Actualizar Producto</button>
            <a href="<?php echo e(route('admin.productos.index')); ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/productos/edit.blade.php ENDPATH**/ ?>