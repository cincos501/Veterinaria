

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Bienvenido al Panel de Administrador</h1>
        <p class="text-center mb-5">Gestiona los servicios, citas, productos y asesoramiento para tus clientes.</p>

        <!-- Fila de estadísticas -->
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Servicios Disponibles</h5>
                        <h3 class="card-text"><?php echo e($serviciosCount); ?></h3>
                        <a href="<?php echo e(route('admin.servicios.index')); ?>" class="btn btn-light">Ver Servicios</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Citas Agendadas</h5>
                        <h3 class="card-text"><?php echo e($citasCount); ?></h3>
                        <a href="<?php echo e(route('admin.citas.index')); ?>" class="btn btn-light">Ver Citas</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Asesoramiento</h5>
                        <h3 class="card-text"><?php echo e($asesoramientosCount); ?></h3>
                        <a href="<?php echo e(route('admin.asesoramiento.index')); ?>" class="btn btn-light">Ver Asesoramiento</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Citas Programadas para Hoy -->
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Citas Agendadas para Hoy</h5>
                    <?php if($citasHoy->isEmpty()): ?>
                        <p>No hay citas programadas para hoy.</p>
                    <?php else: ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Servicio</th>
                                    <th>Fecha y Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $citasHoy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($cita->user->name); ?></td>
                                        <td><?php echo e($cita->servicio->nombre); ?></td>
                                        <td><?php echo e($cita->fecha_hora); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Productos con Bajo Stock -->
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Productos con Bajo Stock</h5>
                    <?php if($productosBajoStock->isEmpty()): ?>
                        <p>No hay productos con bajo stock.</p>
                    <?php else: ?>
                        <p class="alert alert-warning">¡Alerta! Algunos productos están por acabarse.</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre del Producto</th>
                                    <th>Stock Actual</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $productosBajoStock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($producto->nombre); ?></td>
                                        <td><?php echo e($producto->stock); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('admin.productos.edit', $producto->id)); ?>"
                                                class="btn btn-warning btn-sm">Editar</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Gestión de Roles -->
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gestión de Roles</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol Actual</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($usuario->name); ?></td>
                                    <td><?php echo e($usuario->email); ?></td>
                                    <td><?php echo e($usuario->role); ?></td>
                                    <td>
                                        <!-- Asignar rol de Admin -->
                                        <form action="<?php echo e(route('admin.usuario.asignarRol', $usuario->id)); ?>"
                                            method="POST">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-warning btn-sm">Asignar Rol Admin</button>
                                        </form>
                                    </td>
                                    <td>
                                        <?php if($usuario->role === 'admin'): ?>
                                            <!-- Remover Admin -->
                                            <form action="<?php echo e(route('admin.usuario.removerRol', $usuario->id)); ?>"
                                                method="POST">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-danger btn-sm">Remover Admin</button>
                                            </form>
                                        <?php else: ?>
                                            <!-- Remover otro rol -->
                                            <form action="<?php echo e(route('admin.usuario.removerRol', $usuario->id)); ?>"
                                                method="POST">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-danger btn-sm">Remover Rol</button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>