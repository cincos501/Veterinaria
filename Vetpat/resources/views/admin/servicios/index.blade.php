@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Gestión de Servicios</h2>
        <a href="{{ route('admin.servicios.create') }}" class="btn btn-success mb-3">Agregar Servicio</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Requisitos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($servicios as $servicio)
                    <tr>
                        <td>
                            @if ($servicio->imagen)
                                <img src="{{ asset('storage/images/' . $servicio->imagen) }}" alt="Imagen del servicio"
                                    width="100">
                            @else
                                No disponible
                            @endif
                        </td>
                        <td>{{ $servicio->nombre }}</td>
                        <td>{{ $servicio->descripcion }}</td>
                        <td>Bs {{ $servicio->precio }}</td>
                        <td>{{ $servicio->requisitos ?? 'No disponible' }}</td>
                        <td>
                            <a href="{{ route('admin.servicios.edit', $servicio->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('admin.servicios.destroy', $servicio->id) }}" method="POST"
                                style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Estás seguro de eliminar este servicio?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
