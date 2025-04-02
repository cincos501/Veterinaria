

<?php $__env->startSection('content'); ?>
    <div class="text-center">
        <img src="<?php echo e(asset('images/logo/logo_veterinaria.png')); ?>" alt="Logo de Veterinaria Patitas" width="120">
    </div>

    <h2 class="text-center mt-3">Registro</h2>

    <form action="<?php echo e(route('auth.register.submit')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Registrarse</button>

        <p class="text-center mt-2">
            ¿Ya tienes una cuenta? <a href="<?php echo e(route('auth.login')); ?>">Iniciar sesión</a>
        </p>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/auth/register.blade.php ENDPATH**/ ?>