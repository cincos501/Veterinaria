@extends('layouts.auth')

@section('content')
    <div class="container mt-4">
        <div class="text-center">
            <img src="{{ asset('images/logo/logo_veterinaria.png') }}" alt="Logo de Veterinaria Patitas" width="120">
        </div>

        <h2 class="text-center mt-3">Iniciar Sesión</h2>

        <form method="POST" action="{{ route('auth.login.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>

        <p class="mt-3 text-center">
            ¿No tienes una cuenta? <a href="{{ route('auth.register') }}">Regístrate aquí</a>
        </p>
    </div>
@endsection
