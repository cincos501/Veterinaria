@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Editar Servicio</h2>

        <form action="{{ route('admin.servicios.update', $servicio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control"
                    value="{{ old('nombre', $servicio->nombre) }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required>{{ old('descripcion', $servicio->descripcion) }}</textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control"
                    value="{{ old('precio', $servicio->precio) }}" required>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
                @if ($servicio->imagen)
                    <img src="{{ asset('storage/images/' . $servicio->imagen) }}" width="100" class="mt-2">
                @endif
            </div>

            <div class="form-group">
                <label for="requisitos">Requisitos</label>
                <textarea name="requisitos" id="requisitos" class="form-control">{{ old('requisitos', $servicio->requisitos) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Actualizar Servicio</button>
        </form>
    </div>
@endsection
