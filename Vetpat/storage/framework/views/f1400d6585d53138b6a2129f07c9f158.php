

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="mb-4">Editar Servicio</h2>

        <!-- Mostrar errores de validación -->
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Formulario para editar un servicio -->
        <form action="<?php echo e(route('admin.servicios.update', $servicio->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Servicio</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo e($servicio->nombre); ?>"
                    required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required><?php echo e($servicio->descripcion); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio (Bs)</label>
                <input type="number" name="precio" id="precio" class="form-control" step="0.01"
                    value="<?php echo e($servicio->precio); ?>" required>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen del Servicio (Opcional)</label>
                <input type="file" name="imagen" id="imagen" class="form-control">

                <?php if($servicio->imagen): ?>
                    <div class="mt-2">
                        <p>Imagen actual:</p>
                        <img src="<?php echo e(asset('storage/' . $servicio->imagen)); ?>" alt="Imagen del servicio" width="150">
                    </div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Servicio</button>
            <a href="<?php echo e(route('admin.servicios.index')); ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/servicios/edit.blade.php ENDPATH**/ ?>