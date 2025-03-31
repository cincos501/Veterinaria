<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $categorias = ['Medicamentos', 'Higiene y Cuidado', 'Alimentos y Suplementos', 'Cuidado y Alojamiento', 'Juguete'];

        $productos = Producto::when($request->categoria, function ($query) use ($request) {
            return $query->where('categoria', $request->categoria);
        })->get();

        return view('cliente.productos.index', compact('productos', 'categorias'));
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('cliente.productos.show', compact('producto'));
    }
}
