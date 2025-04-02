<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Session;

class CarritoController extends Controller
{
    public function add(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $carrito = Session::get('carrito', []);

        $carrito[$id] = [
            'id' => $producto->id,
            'nombre' => $producto->nombre,
            'precio' => $producto->precio,
            'cantidad' => 1, // Puedes mejorar esto más adelante
            'tipo_entrega' => $request->tipo_entrega
        ];

        Session::put('carrito', $carrito);

        return redirect()->route('cliente.productos.index')->with('success', 'Producto agregado al carrito.');
    }
}
