

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="text-center">Bienvenido, <?php echo e(Auth::user()->name); ?></h2>
        <p class="text-center">Gestiona la información de tus mascotas y agenda tus servicios fácilmente.</p>

        <!-- Sección de perfil -->
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <img src="<?php echo e(asset('images/logo/perfil.jpg')); ?>" alt="Imagen de Perfil" class="rounded-circle"
                            style="width: 150px; height: 150px;">
                        <h5 class="card-title"><?php echo e(Auth::user()->name); ?></h5>
                        <p class="card-text"><strong>Email:</strong> <?php echo e(Auth::user()->email); ?></p>
                        <p class="card-text"><strong>Teléfono:</strong> <?php echo e($cliente->telefono ?? 'No registrado'); ?></p>
                        <p class="card-text"><strong>Dirección:</strong> <?php echo e($cliente->direccion ?? 'No registrada'); ?></p>
                        <a href="<?php echo e(route('cliente.perfil')); ?>" class="btn btn-outline-primary">Editar Perfil</a>
                    </div>
                </div>
            </div>

            <!-- Sección de Citas Pendientes -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h5>Próximas Citas</h5>
                    </div>
                    <div class="card-body">
                        <?php if($citas->isEmpty()): ?>
                            <p>No tienes citas programadas.</p>
                        <?php else: ?>
                            <ul class="list-group">
                                <?php $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item">
                                        <strong><?php echo e($cita->servicio->nombre); ?></strong> -
                                        <?php echo e($cita->fechaFormateada); ?>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                        <a href="<?php echo e(route('cliente.citas.create')); ?>" class="btn btn-success mt-3">Agendar Cita</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Compras -->
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-info text-white">
                        <h5>Mis Compras</h5>
                    </div>
                    <div class="card-body">
                        <?php if($compras->isEmpty()): ?>
                            <p>No has realizado compras aún.</p>
                        <?php else: ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Tipo de Entrega</th>
                                        <th>Nombre del Usuario</th>
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($compra->created_at->format('d/m/Y')); ?></td>
                                            <td><?php echo e($compra->total); ?> Bs</td>
                                            <td><?php echo e($compra->tipo_entrega); ?></td>
                                            <td><?php echo e($compra->user->name); ?></td>
                                            <td><?php echo e($compra->user->cliente->telefono ?? 'No registrado'); ?></td>
                                            <td><?php echo e($compra->user->cliente->direccion ?? 'No registrada'); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cliente', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/cliente/dashboard.blade.php ENDPATH**/ ?>