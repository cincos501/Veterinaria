@extends('layouts.cliente')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Mi Perfil</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Detalles de mi Perfil</h5>
                        <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
                        <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-info text-white">
                        <h5>Editar Perfil</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cliente.actualizarPerfil') }}" method="POST">
                            @csrf
                            <!-- Edición de Datos de Usuario (Nombre, Email, Contraseña) -->
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    value="{{ old('nombre', Auth::user()->name) }}" required>
                                @error('nombre')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', Auth::user()->email) }}" required>
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Nueva Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <small class="form-text text-muted">Deja en blanco si no deseas cambiarla.</small>
                                @error('password')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation">
                            </div>

                            <!-- Edición de Datos de Cliente (Teléfono, Dirección) -->
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                    value="{{ old('telefono', $cliente->telefono) }}" required>
                                @error('telefono')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion"
                                    value="{{ old('direccion', $cliente->direccion) }}" required>
                                @error('direccion')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Actualizar Perfil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
