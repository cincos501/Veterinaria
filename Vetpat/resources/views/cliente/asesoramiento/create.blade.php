@extends('layouts.cliente')

@section('content')
    <div class="container mt-4">
        <h2>Solicitar Asesoramiento</h2>

        <form action="{{ route('cliente.asesoramiento.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="tema" class="form-label">Tema</label>
                <input type="text" class="form-control" id="tema" name="tema" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
        </form>
    </div>
@endsection
