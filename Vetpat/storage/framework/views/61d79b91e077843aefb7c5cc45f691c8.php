

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2 class="mb-4 text-center text-uppercase font-weight-bold">Gestión de Citas</h2>

        <!-- Filtros o búsquedas (si necesitas agregar más filtros) -->
        <div class="mb-3 text-end">
            <!-- Aquí puedes agregar un formulario o barra de búsqueda para filtrar citas -->
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered" id="citasTable">
                <thead class="table-dark">
                    <tr>
                        <th>Cliente</th>
                        <th>Servicio</th>
                        <th>Fecha y Hora</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="animate__animated animate__fadeIn"
                            <?php if(Carbon\Carbon::parse($cita->fecha_hora)->isToday()): ?> style="background-color: #e8f5e9;" <?php endif; ?>>
                            <td><?php echo e($cita->user ? $cita->user->name : 'Usuario no disponible'); ?></td>
                            <td><?php echo e($cita->servicio ? $cita->servicio->nombre : 'Servicio no disponible'); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($cita->fecha_hora)->format('d-m-Y H:i')); ?></td>
                            <td>
                                <?php if($cita->estado == 'pendiente'): ?>
                                    <span class="badge bg-warning text-dark" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Cita pendiente">
                                        <i class="bi bi-clock"></i> <?php echo e(ucfirst($cita->estado)); ?>

                                    </span>
                                <?php elseif($cita->estado == 'confirmada'): ?>
                                    <span class="badge bg-success" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Cita confirmada">
                                        <i class="bi bi-check-circle"></i> <?php echo e(ucfirst($cita->estado)); ?>

                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <form action="<?php echo e(route('admin.citas.update', $cita->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <select name="estado" class="form-select" onchange="this.form.submit()"
                                        aria-label="Seleccionar estado de cita">
                                        <option value="pendiente" <?php echo e($cita->estado == 'pendiente' ? 'selected' : ''); ?>>
                                            Pendiente</option>
                                        <option value="confirmada" <?php echo e($cita->estado == 'confirmada' ? 'selected' : ''); ?>>
                                            Confirmada</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts de Bootstrap para tooltips -->
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/citas/index.blade.php ENDPATH**/ ?>