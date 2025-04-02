@extends('layouts.cliente')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-5">Servicios Disponibles</h2>
        <div class="row">
            @foreach ($servicios as $servicio)
                <div class="col-md-4 mb-4">
                    <div
                        class="card shadow-sm border-0 rounded-lg transition-all transform hover:scale-105 hover:shadow-lg hover:bg-light">
                        <img src="{{ asset('storage/images/' . $servicio->imagen) }}" class="card-img-top rounded-top"
                            alt="{{ $servicio->nombre }}"
                            style="height: 200px; object-fit: cover; transition: transform 0.3s;">
                        <div class="card-body text-center">
                            <h5 class="card-title text-uppercase font-weight-bold">{{ $servicio->nombre }}</h5>
                            <p class="card-text text-muted mb-3">{{ Str::limit($servicio->descripcion, 100) }}</p>
                            <p class="card-text font-weight-bold text-dark">Bs {{ number_format($servicio->precio, 2) }}</p>
                            <a href="{{ route('cliente.servicios.show', $servicio->id) }}"
                                class="btn btn-primary mt-2 w-100 py-2 font-weight-bold transition-all transform hover:bg-primary-500 hover:scale-110">
                                Ver detalles
                            </a>
                            <a href="{{ route('cliente.citas.index', ['servicio_id' => $servicio->id]) }}"
                                class="btn btn-success mt-2 w-100 py-2 font-weight-bold transition-all transform hover:bg-success-500 hover:scale-110">
                                Agendar Cita
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
