@extends('layouts.cliente')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Asesoramiento</h2>

        @if ($asesoramientos->isEmpty())
            <div class="alert alert-info text-center">No hay asesoramientos disponibles en este momento.</div>
        @else
            <div class="row">
                @foreach ($asesoramientos as $asesoramiento)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm rounded h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $asesoramiento->titulo }}</h5>
                                <p class="card-text">
                                    {{ Str::limit($asesoramiento->contenido, 80) }}
                                    @if (strlen($asesoramiento->contenido) > 80)
                                        <a href="#" class="text-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalAsesoramiento{{ $asesoramiento->id }}">Ver más</a>
                                    @endif
                                </p>

                                <div class="mt-auto text-center">
                                    @if ($asesoramiento->contacto_whatsapp)
                                        <a href="https://wa.me/{{ $asesoramiento->contacto_whatsapp }}" target="_blank"
                                            class="btn btn-success w-100">
                                            <i class="fab fa-whatsapp"></i> Contactar
                                        </a>
                                    @else
                                        <span class="text-muted">No disponible</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal para contenido completo -->
                    <div class="modal fade" id="modalAsesoramiento{{ $asesoramiento->id }}" tabindex="-1"
                        aria-labelledby="modalLabel{{ $asesoramiento->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel{{ $asesoramiento->id }}">
                                        {{ $asesoramiento->titulo }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ $asesoramiento->contenido }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
