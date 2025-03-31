

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="text-center">Iniciar Sesión</h2>

        <form method="POST" action="<?php echo e(route('auth.login.submit')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>

        <p class="mt-3 text-center">
            ¿No tienes una cuenta? <a href="<?php echo e(route('auth.register')); ?>">Regístrate aquí</a>
        </p>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/auth/login.blade.php ENDPATH**/ ?>