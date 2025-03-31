@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Lista de Productos</h1>

        <!-- Formulario de filtrado por categoría -->
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
            </div>
        </form>

        <a href="{{ route('admin.productos.create') }}" class="btn btn-primary mb-3">Agregar Producto</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>
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
                            <a href="{{ route('admin.productos.edit', $producto->id) }}"
                                class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('admin.productos.destroy', $producto->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
