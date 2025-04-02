@extends('layouts.cliente')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">{{ $producto->nombre }}</h1>

        <div class="row">
            <!-- Imagen del producto -->
            <div class="col-md-6 d-flex justify-content-center">
                <div class="card shadow p-3">
                    @if ($producto->imagen)
                        <img src="{{ asset('storage/imagenes_productos/' . $producto->imagen) }}" class="img-fluid rounded"
                            alt="{{ $producto->nombre }}">
                    @else
                        <div class="p-5 text-center bg-light rounded">Sin imagen</div>
                    @endif
                </div>
            </div>

            <!-- Detalles del producto -->
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
                    <p><strong>Precio base:</strong> Bs {{ number_format($producto->precio, 2) }}</p>
                    <p><strong>Stock disponible:</strong> {{ $producto->stock }}</p>
                    <p><strong>Categoría:</strong> {{ $producto->categoria }}</p>

                    <hr>

                    <div class="text-center">
                        <button class="btn btn-success" disabled>Comprar</button>
                        <a href="{{ route('cliente.productos.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
