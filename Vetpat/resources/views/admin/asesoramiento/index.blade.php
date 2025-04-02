@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm p-4">
            <h2 class="mb-3">Gestión de Asesoramientos</h2>
            <a href="{{ route('admin.asesoramiento.create') }}" class="btn btn-success mb-3">
                <i class="fas fa-plus"></i> Agregar Asesoramiento
            </a>

            @if ($asesoramientos->isEmpty())
                <div class="alert alert-warning">No hay asesoramientos registrados.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Título</th>
                                <th>Contenido</th>
                                <th>WhatsApp</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asesoramientos as $asesoramiento)
                                <tr>
                                    <td>{{ $asesoramiento->titulo }}</td>
                                    <td>
                                        {{ Str::limit($asesoramiento->contenido, 50) }}
                                        @if (strlen($asesoramiento->contenido) > 50)
                                            <a href="#" class="text-primary" data-bs-toggle="modal"
                                                data-bs-target="#verMasModal{{ $asesoramiento->id }}">Ver más</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($asesoramiento->contacto_whatsapp)
                                            <a href="https://wa.me/{{ $asesoramiento->contacto_whatsapp }}" target="_blank"
                                                class="btn btn-success btn-sm">
                                                <i class="fab fa-whatsapp"></i> Chat
                                            </a>
                                        @else
                                            <span class="text-muted">No disponible</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.asesoramiento.edit', $asesoramiento->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <button class="btn btn-danger btn-sm"
                                            onclick="confirmarEliminacion({{ $asesoramiento->id }})">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                        <form id="delete-form-{{ $asesoramiento->id }}"
                                            action="{{ route('admin.asesoramiento.destroy', $asesoramiento->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal para ver contenido completo -->
                                <div class="modal fade" id="verMasModal{{ $asesoramiento->id }}" tabindex="-1"
                                    aria-labelledby="verMasLabel{{ $asesoramiento->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="verMasLabel{{ $asesoramiento->id }}">
                                                    {{ $asesoramiento->titulo }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $asesoramiento->contenido }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <script>
        function confirmarEliminacion(id) {
            if (confirm('¿Estás seguro de que deseas eliminar este asesoramiento?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
@endsection
