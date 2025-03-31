@extends('layouts.cliente')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Agendar Nueva Cita</h2>

        <form action="{{ route('cliente.citas.store') }}" method="POST" class="mt-3">
            @csrf

            <!-- Selección de Servicio -->
            <div class="mb-3">
                <label for="servicio" class="form-label">Selecciona un servicio:</label>
                <select name="servicio" id="servicio" class="form-control" required>
                    <option value="">-- Seleccionar --</option>
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                    @endforeach
                </select>
                @error('servicio')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Selección de Fecha -->
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de la cita:</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
                @error('fecha')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Selección de Hora -->
            <div class="mb-3">
                <label for="hora" class="form-label">Hora de la cita:</label>
                <input type="time" name="hora" id="hora" class="form-control" required>
                @error('hora')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Botón de Agendar -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Agendar Cita</button>
                <a href="{{ route('cliente.citas.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
