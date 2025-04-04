

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Lista de Productos</h1>

        <form method="GET" action="<?php echo e(route('admin.productos.index')); ?>" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <select name="categoria" class="form-control" onchange="this.form.submit()">
                        <option value="">Todas las categorías</option>
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($categoria); ?>" <?php echo e(request('categoria') == $categoria ? 'selected' : ''); ?>>
                                <?php echo e($categoria); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="promocion" class="form-control" onchange="this.form.submit()">
                        <option value="">Promociones y No promociones</option>
                        <option value="1" <?php echo e(request('promocion') == '1' ? 'selected' : ''); ?>>Solo en promoción
                        </option>
                        <option value="0" <?php echo e(request('promocion') == '0' ? 'selected' : ''); ?>>No en promoción</option>
                    </select>
                </div>
            </div>
        </form>

        <div class="d-flex justify-content-between mb-3">
            <a href="<?php echo e(route('admin.productos.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Agregar Producto
            </a>
        </div>

        <!-- Tabla de productos -->
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Categoría</th>
                        <th>En Promoción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php if($producto->imagen): ?>
                                    <img src="<?php echo e(asset('storage/imagenes_productos/' . $producto->imagen)); ?>"
                                        alt="<?php echo e($producto->nombre); ?>" width="50">
                                <?php else: ?>
                                    <span>Sin imagen</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($producto->nombre); ?></td>
                            <td><?php echo e($producto->descripcion); ?></td>
                            <td>Bs <?php echo e(number_format($producto->precio, 2)); ?></td>
                            <td><?php echo e($producto->stock); ?></td>
                            <td><?php echo e($producto->categoria); ?></td>
                            <td>
                                <form action="<?php echo e(route('admin.productos.togglePromocion', $producto->id)); ?>" method="POST"
                                    style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <button type="submit"
                                        class="btn btn-sm <?php echo e($producto->promocion ? 'btn-success' : 'btn-secondary'); ?>">
                                        <?php echo e($producto->promocion ? 'Sí' : 'No'); ?>

                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="<?php echo e(route('admin.productos.edit', $producto->id)); ?>"
                                    class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <form action="<?php echo e(route('admin.productos.destroy', $producto->id)); ?>" method="POST"
                                    style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- SweetAlert2 JS (Confirmación de eliminación) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Evitar que el formulario se envíe inmediatamente

                const form = this.closest('form');

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'No podrás revertir esta acción.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Enviar el formulario si se confirma
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\veterinaria\Vetpat\resources\views/admin/productos/index.blade.php ENDPATH**/ ?>