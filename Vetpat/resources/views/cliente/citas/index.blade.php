@extends('layouts.cliente')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center text-uppercase font-weight-bold">Mis Citas</h2>

        <div class="text-center mb-4">
            <a href="{{ route('cliente.citas.create') }}" class="btn btn-primary">
                <i class="bi bi-calendar-plus"></i> Crear Nueva Cita
            </a>
        </div>

        @if ($citas->isEmpty())
            <div class="alert alert-info text-center">
                <strong>No tienes citas agendadas.</strong>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered" id="citasClienteTable">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Servicio</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($citas as $cita)
                            <tr class="animate__animated animate__fadeIn">
                                <td>{{ $cita->id }}</td>
                                <td>{{ $cita->servicio->nombre ?? 'Servicio no disponible' }}</td>
                                <td>{{ \Carbon\Carbon::parse($cita->fecha_hora)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($cita->fecha_hora)->format('H:i') }}</td>
                                <td>
                                    @if ($cita->estado == 'pendiente')
                                        <span class="badge bg-warning text-dark" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Cita pendiente">
                                            <i class="bi bi-clock"></i> {{ ucfirst($cita->estado) }}
                                        </span>
                                    @elseif ($cita->estado == 'confirmada')
                                        <span class="badge bg-success" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Cita confirmada">
                                            <i class="bi bi-check-circle"></i> {{ ucfirst($cita->estado) }}
                                        </span>
                                    @elseif ($cita->estado == 'cancelada')
                                        <span class="badge bg-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Cita cancelada">
                                            <i class="bi bi-x-circle"></i> {{ ucfirst($cita->estado) }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Scripts de Bootstrap para tooltips -->
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
@endsection
