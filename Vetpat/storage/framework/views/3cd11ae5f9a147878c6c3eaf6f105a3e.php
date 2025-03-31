

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="text-center">Agendar Nueva Cita</h2>

        <form action="<?php echo e(route('cliente.citas.store')); ?>" method="POST" class="mt-3">
            <?php echo csrf_field(); ?>

            <!-- Selección de Servicio -->
            <div class="mb-3">
                <label for="servicio" class="form-label">Selecciona un servicio:</label>
                <select name="servicio" id="servicio" class="form-control" required>
                    <option value="">-- Seleccionar --</option>
                    <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($servicio->id); ?>"><?php echo e($servicio->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['servicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Selección de Fecha -->
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de la cita:</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
                <?php $__errorArgs = ['fecha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Selección de Hora -->
            <div class="mb-3">
                <label for="hora" class="form-label">Hora de la cita:</label>
                <input type="time" name="hora" id="hora" class="form-control" required>
                <?php $__errorArgs = ['hora'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Botón de Agendar -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Agendar Cita</button>
                <a href="<?php echo e(route('cliente.citas.index')); ?>" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/cliente/citas/create.blade.php ENDPATH**/ ?>