@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Editar Producto</h1>

        <form action="{{ route('admin.productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3" required>{{ $producto->descripcion }}</textarea>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio (Bs)</label>
                <input type="number" name="precio" class="form-control" step="0.01" value="{{ $producto->precio }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ $producto->stock }}" required>
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <select name="categoria" class="form-control" required>
                    @foreach (['Medicamentos', 'Higiene y Cuidado', 'Alimentos y Suplementos', 'Cuidado y Alojamiento', 'Juguete'] as $categoria)
                        <option value="{{ $categoria }}" {{ $producto->categoria == $categoria ? 'selected' : '' }}>
                            {{ $categoria }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" name="imagen" class="form-control">
                @if ($producto->imagen)
                    <p class="mt-2">Imagen actual:</p>
                    <img src="{{ asset('storage/imagenes_productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                        width="100">
                @endif
            </div>

            <button type="submit" class="btn btn-success">Actualizar Producto</button>
            <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
