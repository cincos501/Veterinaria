

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2>Agregar Asesoramiento</h2>

        <form action="<?php echo e(route('admin.asesoramiento.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contenido</label>
                <textarea name="contenido" class="form-control" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Número de WhatsApp (opcional)</label>
                <input type="text" name="contacto_whatsapp" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/asesoramiento/create.blade.php ENDPATH**/ ?>