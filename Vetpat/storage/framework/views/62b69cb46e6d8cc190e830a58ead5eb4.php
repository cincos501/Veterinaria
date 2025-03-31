

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="mb-4">Agregar Servicio</h2>

        <form action="<?php echo e(route('admin.servicios.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Precio (Bs)</label>
                <input type="number" name="precio" class="form-control" step="0.01" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input type="file" name="imagen" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?php echo e(route('admin.servicios.index')); ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/servicios/create.blade.php ENDPATH**/ ?>