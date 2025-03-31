 <!-- Extiende el layout principal de Admin, asumiendo que usas el mismo layout básico -->

<?php $__env->startSection('content'); ?>
    <!-- Define la sección 'content' que se inyectará en el layout -->
    <h1>Bienvenido al Panel de Administrador</h1>
    <p>Modifica, Agrega producto etc.....</p>

    <!-- Opcional: Agregar más información, estadísticas, etc. -->
<?php $__env->stopSection(); ?> <!-- Fin de la sección 'content' -->

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>