@extends('layouts.cliente')

@section('content')
    <div class="container">
        <h1 class="mb-4">{{ $producto->nombre }}</h1>

        <div class="row">
            <div class="col-md-6">
                @if ($producto->imagen)
                    <img src="{{ asset('storage/imagenes_productos/' . $producto->imagen) }}" class="img-fluid"
                        alt="{{ $producto->nombre }}">
                @else
                    <div class="p-5 text-center bg-light">Sin imagen</div>
                @endif
            </div>
            <div class="col-md-6">
                <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
                <p><strong>Precio:</strong> Bs {{ number_format($producto->precio, 2) }}</p>
                <p><strong>Stock disponible:</strong> {{ $producto->stock }}</p>
                <p><strong>Categoría:</strong> {{ $producto->categoria }}</p>

                <a href="{{ route('cliente.productos.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
@endsection
