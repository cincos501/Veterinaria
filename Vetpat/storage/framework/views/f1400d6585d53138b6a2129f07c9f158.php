

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="mb-4">Editar Servicio</h2>

        <form action="<?php echo e(route('admin.servicios.update', $servicio->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control"
                    value="<?php echo e(old('nombre', $servicio->nombre)); ?>" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required><?php echo e(old('descripcion', $servicio->descripcion)); ?></textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control"
                    value="<?php echo e(old('precio', $servicio->precio)); ?>" required>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
                <?php if($servicio->imagen): ?>
                    <img src="<?php echo e(asset('storage/images/' . $servicio->imagen)); ?>" width="100" class="mt-2">
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="requisitos">Requisitos</label>
                <textarea name="requisitos" id="requisitos" class="form-control"><?php echo e(old('requisitos', $servicio->requisitos)); ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Actualizar Servicio</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/servicios/edit.blade.php ENDPATH**/ ?>