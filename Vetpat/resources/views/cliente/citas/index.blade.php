@extends('layouts.cliente')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Mis Citas</h2>

        <div class="text-center mb-4">
            <a href="{{ route('cliente.citas.create') }}" class="btn btn-primary">Crear Nueva Cita</a>
        </div>

        @if ($citas->isEmpty())
            <p>No tienes citas agendadas.</p>
        @else
            <table class="table table-bordered">
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
                        <tr>
                            <td>{{ $cita->id }}</td>
                            <td>{{ $cita->servicio->nombre ?? 'Servicio no disponible' }}</td>
                            <td>{{ \Carbon\Carbon::parse($cita->fecha_hora)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($cita->fecha_hora)->format('H:i') }}</td>
                            <td>{{ $cita->estado }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
