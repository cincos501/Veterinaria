@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Gestión de Asesoramientos</h2>
        <a href="{{ route('admin.asesoramiento.create') }}" class="btn btn-success mb-3">Agregar Asesoramiento</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>WhatsApp</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asesoramientos as $asesoramiento)
                    <tr>
                        <td>{{ $asesoramiento->titulo }}</td>
                        <td>{{ Str::limit($asesoramiento->contenido, 50) }}</td>
                        <td>{{ $asesoramiento->contacto_whatsapp ?? 'No disponible' }}</td>
                        <td>
                            <a href="{{ route('admin.asesoramiento.edit', $asesoramiento->id) }}"
                                class="btn btn-warning">Editar</a>
                            <form action="{{ route('admin.asesoramiento.destroy', $asesoramiento->id) }}" method="POST"
                                style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
