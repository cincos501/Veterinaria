@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Lista de Productos</h1>

        <form method="GET" action="{{ route('admin.productos.index') }}" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <select name="categoria" class="form-control" onchange="this.form.submit()">
                        <option value="">Todas las categorías</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria }}" {{ request('categoria') == $categoria ? 'selected' : '' }}>
                                {{ $categoria }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="promocion" class="form-control" onchange="this.form.submit()">
                        <option value="">Promociones y No promociones</option>
                        <option value="1" {{ request('promocion') == '1' ? 'selected' : '' }}>Solo en promoción
                        </option>
                        <option value="0" {{ request('promocion') == '0' ? 'selected' : '' }}>No en promoción</option>
                    </select>
                </div>
            </div>
        </form>

        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('admin.productos.create') }}" class="btn btn-primary">
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
                    @foreach ($productos as $producto)
                        <tr>
                            <td>
                                @if ($producto->imagen)
                                    <img src="{{ asset('storage/imagenes_productos/' . $producto->imagen) }}"
                                        alt="{{ $producto->nombre }}" width="50">
                                @else
                                    <span>Sin imagen</span>
                                @endif
                            </td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>Bs {{ number_format($producto->precio, 2) }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>{{ $producto->categoria }}</td>
                            <td>
                                <form action="{{ route('admin.productos.togglePromocion', $producto->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="btn btn-sm {{ $producto->promocion ? 'btn-success' : 'btn-secondary' }}">
                                        {{ $producto->promocion ? 'Sí' : 'No' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('admin.productos.edit', $producto->id) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <form action="{{ route('admin.productos.destroy', $producto->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
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
@endsection
