@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Editar Asesoramiento</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.asesoramiento.update', $asesoramiento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $asesoramiento->titulo }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido</label>
                <textarea class="form-control" id="contenido" name="contenido" rows="4" required>{{ $asesoramiento->contenido }}</textarea>
            </div>

            <div class="mb-3">
                <label for="contacto_whatsapp" class="form-label">Número de WhatsApp (Opcional)</label>
                <input type="text" class="form-control" id="contacto_whatsapp" name="contacto_whatsapp"
                    value="{{ $asesoramiento->contacto_whatsapp }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Asesoramiento</button>
            <a href="{{ route('admin.asesoramiento.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
