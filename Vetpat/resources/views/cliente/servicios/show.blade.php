@extends('layouts.cliente')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">{{ $servicio->nombre }}</h2>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/images/' . $servicio->imagen) }}" class="img-fluid" alt="{{ $servicio->nombre }}">
            </div>
            <div class="col-md-6">
                <h4>Descripción</h4>
                <p>{{ $servicio->descripcion }}</p>

                <h4>Requisitos</h4>
                <p>{{ $servicio->requisitos ?? 'No hay requisitos disponibles.' }}</p>

                <a href="{{ route('cliente.citas.index') }}" class="btn btn-success">Agendar cita</a>
            </div>
        </div>
    </div>
@endsection
