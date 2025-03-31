@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Gestión de Citas</h2>
        <table class="table table-bordered">
            <thead>
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
                    <tr>
                        <td>{{ $cita->user->name }}</td>
                        <td>{{ $cita->servicio->nombre }}</td>
                        <td>{{ $cita->fecha_hora }}</td>
                        <td>{{ $cita->estado }}</td>
                        <td>
                            <form action="{{ route('admin.citas.update', $cita->id) }}" method="POST">
                                @csrf @method('PUT')
                                <select name="estado" class="form-select" onchange="this.form.submit()">
                                    <option value="pendiente" {{ $cita->estado == 'pendiente' ? 'selected' : '' }}>Pendiente
                                    </option>
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
@endsection
