@extends('layouts.cliente')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Bienvenido, {{ Auth::user()->name }}</h2>
        <p class="text-center">Gestiona la información de tus mascotas y agenda tus servicios fácilmente.</p>

        <!-- Sección de perfil -->
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <img src="{{ asset('images/logo/perfil.jpg') }}" alt="Imagen de Perfil" class="rounded-circle"
                            style="width: 150px; height: 150px;">
                        <h5 class="card-title">{{ Auth::user()->name }}</h5>
                        <p class="card-text"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p class="card-text"><strong>Teléfono:</strong> {{ $cliente->telefono ?? 'No registrado' }}</p>
                        <p class="card-text"><strong>Dirección:</strong> {{ $cliente->direccion ?? 'No registrada' }}</p>
                        <a href="{{ route('cliente.perfil') }}" class="btn btn-outline-primary">Editar Perfil</a>
                    </div>
                </div>
            </div>

            <!-- Sección de Citas Pendientes -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h5>Próximas Citas</h5>
                    </div>
                    <div class="card-body">
                        @if ($citas->isEmpty())
                            <p>No tienes citas programadas.</p>
                        @else
                            <ul class="list-group">
                                @foreach ($citas as $cita)
                                    <li class="list-group-item">
                                        <strong>{{ $cita->servicio->nombre }}</strong> -
                                        {{ $cita->fechaFormateada }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <a href="{{ route('cliente.citas.create') }}" class="btn btn-success mt-3">Agendar Cita</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Compras -->
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-info text-white">
                        <h5>Mis Compras</h5>
                    </div>
                    <div class="card-body">
                        @if ($compras->isEmpty())
                            <p>No has realizado compras aún.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Tipo de Entrega</th>
                                        <th>Nombre del Usuario</th>
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($compras as $compra)
                                        <tr>
                                            <td>{{ $compra->created_at->format('d/m/Y') }}</td>
                                            <td>{{ $compra->total }} Bs</td>
                                            <td>{{ $compra->tipo_entrega }}</td>
                                            <td>{{ $compra->user->name }}</td>
                                            <td>{{ $compra->user->cliente->telefono ?? 'No registrado' }}</td>
                                            <td>{{ $compra->user->cliente->direccion ?? 'No registrada' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
