@extends('layouts.cliente')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Servicios Disponibles</h2>
        <div class="row">
            @foreach ($servicios as $servicio)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/images/' . $servicio->imagen) }}" class="card-img-top"
                            alt="{{ $servicio->nombre }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $servicio->nombre }}</h5>
                            <p class="card-text">{{ $servicio->descripcion }}</p>
                            <p class="card-text"><strong>Bs {{ $servicio->precio }}</strong></p>
                            <a href="{{ route('cliente.servicios.show', $servicio->id) }}" class="btn btn-primary">
                                Ver detalles
                            </a>
                            <a href="{{ route('cliente.citas.index', ['servicio_id' => $servicio->id]) }}"
                                class="btn btn-success">
                                Agendar Cita
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
