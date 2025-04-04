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
                        <!-- Botón Comprar -->
                        <button class="btn btn-success" id="comprarBtn">Comprar</button>
                        <a href="{{ route('cliente.productos.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Detalle de Compra -->
    <div class="modal fade" id="detalleCompraModal" tabindex="-1" aria-labelledby="detalleCompraLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detalleCompraLabel">Detalle de la Compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Producto:</strong> {{ $producto->nombre }}</p>
                    <p><strong>Precio Total:</strong> Bs {{ number_format($producto->precio, 2) }}</p>
                    <p><strong>Fecha:</strong> {{ now()->format('d/m/Y H:i') }}</p>

                    <!-- Formulario para completar perfil y realizar la compra -->
                    <form action="{{ route('cliente.comprar', $producto->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" value="1"
                                min="1" max="{{ $producto->stock }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipo_compra" class="form-label">Tipo de Compra</label>
                            <select class="form-select" id="tipo_entrega" name="tipo_entrega" required>
                                <option value="recoger">Recoger en tienda</option>
                                <option value="enviar">Enviar a casa</option>
                            </select>
                        </div>
                        <hr>
                        <div class="text-center">
                            <!-- Botones para confirmar -->
                            <button type="submit" class="btn btn-primary">Confirmar Compra</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>

                    <!-- Imagen de QR (Ejemplo usando una imagen estática, puedes generar dinámicamente con un paquete) -->
                    <img src="{{ asset('images/qr/qr.jpg') }}" alt="Código QR de Pago" class="img-fluid mt-3">
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Scripts -->
    <script>
        document.getElementById('comprarBtn').addEventListener('click', function() {
            var compraModal = new bootstrap.Modal(document.getElementById('detalleCompraModal'));
            compraModal.show();
        });
    </script>
@endsection
