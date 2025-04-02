

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="mb-3">Editar Asesoramiento</h2>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.asesoramiento.update', $asesoramiento->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo e($asesoramiento->titulo); ?>"
                    required>
            </div>

            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido</label>
                <textarea class="form-control" id="contenido" name="contenido" rows="4" required><?php echo e($asesoramiento->contenido); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="contacto_whatsapp" class="form-label">Número de WhatsApp (Opcional)</label>
                <input type="text" class="form-control" id="contacto_whatsapp" name="contacto_whatsapp"
                    value="<?php echo e($asesoramiento->contacto_whatsapp); ?>">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Asesoramiento</button>
            <a href="<?php echo e(route('admin.asesoramiento.index')); ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/asesoramiento/edit.blade.php ENDPATH**/ ?>