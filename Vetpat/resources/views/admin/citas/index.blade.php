@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4 text-center text-uppercase font-weight-bold">Gestión de Citas</h2>

        <!-- Filtros o búsquedas (si necesitas agregar más filtros) -->
        <div class="mb-3 text-end">
            <!-- Aquí puedes agregar un formulario o barra de búsqueda para filtrar citas -->
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered" id="citasTable">
                <thead class="table-dark">
                    <tr>
                        <th>Cliente</th>
                        <th>Servicio</th>
                        <th>Fecha y Hora</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citas as $cita)
                        <tr class="animate__animated animate__fadeIn"
                            @if (Carbon\Carbon::parse($cita->fecha_hora)->isToday()) style="background-color: #e8f5e9;" @endif>
                            <td>{{ $cita->user ? $cita->user->name : 'Usuario no disponible' }}</td>
                            <td>{{ $cita->servicio ? $cita->servicio->nombre : 'Servicio no disponible' }}</td>
                            <td>{{ \Carbon\Carbon::parse($cita->fecha_hora)->format('d-m-Y H:i') }}</td>
                            <td>
                                @if ($cita->estado == 'pendiente')
                                    <span class="badge bg-warning text-dark" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Cita pendiente">
                                        <i class="bi bi-clock"></i> {{ ucfirst($cita->estado) }}
                                    </span>
                                @elseif ($cita->estado == 'confirmada')
                                    <span class="badge bg-success" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Cita confirmada">
                                        <i class="bi bi-check-circle"></i> {{ ucfirst($cita->estado) }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.citas.update', $cita->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="estado" class="form-select" onchange="this.form.submit()"
                                        aria-label="Seleccionar estado de cita">
                                        <option value="pendiente" {{ $cita->estado == 'pendiente' ? 'selected' : '' }}>
                                            Pendiente</option>
                                        <option value="confirmada" {{ $cita->estado == 'confirmada' ? 'selected' : '' }}>
                                            Confirmada</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts de Bootstrap para tooltips -->
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
@endsection
