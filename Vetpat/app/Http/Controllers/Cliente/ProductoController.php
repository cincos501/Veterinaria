<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth; // Para acceder al usuario autenticado

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $categorias = ['Medicamentos', 'Higiene y Cuidado', 'Alimentos y Suplementos', 'Cuidado y Alojamiento', 'Juguete'];

        $productos = Producto::when($request->categoria, function ($query) use ($request) {
            return $query->where('categoria', $request->categoria);
        })->paginate(12);  // Usamos paginate() para dividir los resultados

        return view('cliente.productos.index', compact('productos', 'categorias'));
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('cliente.productos.show', compact('producto'));
    }

    public function crearCompra(Request $request, $id)
    {
        // Validar que el producto exista
        $producto = Producto::findOrFail($id);

        // Validar la cantidad solicitada
        if ($request->cantidad > $producto->stock) {
            return back()->with('error', 'No hay suficiente stock disponible.');
        }

        // Crear la compra
        $compra = new Compra();
        $compra->user_id = Auth::id(); // Asociamos la compra al usuario autenticado
        $compra->total = $producto->precio * $request->cantidad;
        $compra->tipo_entrega = $request->tipo_entrega;
        $compra->estado = 'pendiente'; // Puedes agregar más lógica para manejar el estado de la compra
        $compra->save();

        // Asociar el producto con la compra
        $compra->productos()->attach($producto->id, [
            'cantidad' => $request->cantidad,
            'precio' => $producto->precio
        ]);

        // Actualizar el stock del producto
        $producto->stock -= $request->cantidad;
        $producto->save();

        // Redirigir con éxito
        return redirect()->route('cliente.productos.index')->with('success', 'Compra realizada con éxito.');
    }
}
