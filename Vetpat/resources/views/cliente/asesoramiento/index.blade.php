@extends('layouts.cliente')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Asesoramiento</h2>

        <div class="row">
            @foreach ($asesoramientos as $asesoramiento)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $asesoramiento->titulo }}</h5>
                            <p class="card-text">{{ $asesoramiento->contenido }}</p>

                            @if ($asesoramiento->contacto_whatsapp)
                                <a href="https://wa.me/{{ $asesoramiento->contacto_whatsapp }}" target="_blank"
                                    class="btn btn-success">
                                    Contactar por WhatsApp
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
