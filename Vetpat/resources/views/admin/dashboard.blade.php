@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Bienvenido al Panel de Administrador</h1>
        <p class="text-center mb-5">Gestiona los servicios, citas, productos y asesoramiento para tus clientes.</p>

        <!-- Fila de estadísticas -->
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Servicios Disponibles</h5>
                        <h3 class="card-text">{{ $serviciosCount }}</h3>
                        <a href="{{ route('admin.servicios.index') }}" class="btn btn-light">Ver Servicios</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Citas Agendadas</h5>
                        <h3 class="card-text">{{ $citasCount }}</h3>
                        <a href="{{ route('admin.citas.index') }}" class="btn btn-light">Ver Citas</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Asesoramiento</h5>
                        <h3 class="card-text">{{ $asesoramientosCount }}</h3>
                        <a href="{{ route('admin.asesoramiento.index') }}" class="btn btn-light">Ver Asesoramiento</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Citas Programadas para Hoy -->
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Citas Agendadas para Hoy</h5>
                    @if ($citasHoy->isEmpty())
                        <p>No hay citas programadas para hoy.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Servicio</th>
                                    <th>Fecha y Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citasHoy as $cita)
                                    <tr>
                                        <td>{{ $cita->user->name }}</td>
                                        <td>{{ $cita->servicio->nombre }}</td>
                                        <td>{{ $cita->fecha_hora }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

        <!-- Productos con Bajo Stock -->
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Productos con Bajo Stock</h5>
                    @if ($productosBajoStock->isEmpty())
                        <p>No hay productos con bajo stock.</p>
                    @else
                        <p class="alert alert-warning">¡Alerta! Algunos productos están por acabarse.</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre del Producto</th>
                                    <th>Stock Actual</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productosBajoStock as $producto)
                                    <tr>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->stock }}</td>
                                        <td>
                                            <a href="{{ route('admin.productos.edit', $producto->id) }}"
                                                class="btn btn-warning btn-sm">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

        <!-- Gestión de Roles -->
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gestión de Roles</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol Actual</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->role }}</td>
                                    <td>
                                        <!-- Asignar rol de Admin -->
                                        <form action="{{ route('admin.usuario.asignarRol', $usuario->id) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-sm">Asignar Rol Admin</button>
                                        </form>
                                    </td>
                                    <td>
                                        @if ($usuario->role === 'admin')
                                            <!-- Remover Admin -->
                                            <form action="{{ route('admin.usuario.removerRol', $usuario->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Remover Admin</button>
                                            </form>
                                        @else
                                            <!-- Remover otro rol -->
                                            <form action="{{ route('admin.usuario.removerRol', $usuario->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Remover Rol</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
