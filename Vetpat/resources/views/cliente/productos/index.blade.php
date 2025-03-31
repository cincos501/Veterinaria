@extends('layouts.cliente')

@section('content')
    <div class="container">
        <h1 class="mb-4">Tienda de Productos</h1>

        <!-- Filtro por categoría -->
        <form method="GET" action="{{ route('cliente.productos.index') }}" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <select name="categoria" class="form-control" onchange="this.form.submit()">
                        <option value="">Todas las categorías</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria }}" {{ request('categoria') == $categoria ? 'selected' : '' }}>
                                {{ $categoria }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>

        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($producto->imagen)
                            <img src="{{ asset('storage/imagenes_productos/' . $producto->imagen) }}" class="card-img-top"
                                alt="{{ $producto->nombre }}">
                        @else
                            <div class="p-5 text-center">Sin imagen</div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text">{{ Str::limit($producto->descripcion, 100) }}</p>
                            <p><strong>Bs {{ number_format($producto->precio, 2) }}</strong></p>
                            <a href="{{ route('cliente.productos.show', $producto->id) }}" class="btn btn-primary">Ver
                                Detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
