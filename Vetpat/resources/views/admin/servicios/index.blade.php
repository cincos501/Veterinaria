@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Lista de Servicios</h1>

        <form method="GET" action="{{ route('admin.servicios.index') }}" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Buscar por nombre o descripción"
                        value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>

        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('admin.servicios.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Agregar Servicio
            </a>
        </div>

        <!-- Tabla de servicios -->
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Requisitos</th>
                        <th>En Promoción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicios as $servicio)
                        <tr>
                            <td>
                                @if ($servicio->imagen)
                                    <img src="{{ asset('storage/images/' . $servicio->imagen) }}"
                                        alt="{{ $servicio->nombre }}" width="50">
                                @else
                                    <span>Sin imagen</span>
                                @endif
                            </td>
                            <td>{{ $servicio->nombre }}</td>
                            <td>{{ $servicio->descripcion }}</td>
                            <td>Bs {{ number_format($servicio->precio, 2) }}</td>
                            <td>{{ $servicio->requisitos ?? 'No tiene' }}</td>
                            <td>
                                <form action="{{ route('admin.servicios.togglePromocion', $servicio->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="btn btn-sm {{ $servicio->promocion ? 'btn-success' : 'btn-secondary' }}">
                                        {{ $servicio->promocion ? 'Sí' : 'No' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('admin.servicios.edit', $servicio->id) }}"
                                    class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('admin.servicios.destroy', $servicio->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $servicios->links() }} <!-- Paginación -->
    </div>
@endsection
