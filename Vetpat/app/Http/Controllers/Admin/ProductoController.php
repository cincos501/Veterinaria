<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $categorias = ['Medicamentos', 'Higiene y Cuidado', 'Alimentos y Suplementos', 'Cuidado y Alojamiento', 'Juguete'];

        // Filtrar por categoría y promoción si se selecciona
        $productos = Producto::when($request->categoria, function ($query) use ($request) {
            return $query->where('categoria', $request->categoria);
        })->when($request->promocion !== null, function ($query) use ($request) {
            return $query->where('promocion', $request->promocion);
        })->get();

        return view('admin.productos.index', compact('productos', 'categorias'));
    }

    public function create()
    {
        $categorias = ['Medicamentos', 'Higiene y Cuidado', 'Alimentos y Suplementos', 'Cuidado y Alojamiento', 'Juguete'];
        return view('admin.productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categoria' => 'required|in:Medicamentos,Higiene y Cuidado,Alimentos y Suplementos,Cuidado y Alojamiento,Juguete',
            'promocion' => 'nullable|boolean',
        ]);

        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('imagenes_productos', 'public');
            $imagenPath = basename($imagenPath);
        }

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'imagen' => $imagenPath,
            'categoria' => $request->categoria,
            'promocion' => $request->has('promocion'),
        ]);

        return redirect()->route('admin.productos.index')->with('success', 'Producto agregado correctamente.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = ['Medicamentos', 'Higiene y Cuidado', 'Alimentos y Suplementos', 'Cuidado y Alojamiento', 'Juguete'];
        return view('admin.productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categoria' => 'required|in:Medicamentos,Higiene y Cuidado,Alimentos y Suplementos,Cuidado y Alojamiento,Juguete',
            'promocion' => 'nullable|boolean',
        ]);

        $imagenPath = $producto->imagen;
        if ($request->hasFile('imagen')) {
            if ($producto->imagen) {
                Storage::disk('public')->delete('imagenes_productos/' . $producto->imagen);
            }
            $imagenPath = $request->file('imagen')->store('imagenes_productos', 'public');
            $imagenPath = basename($imagenPath);
        }

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'imagen' => $imagenPath,
            'categoria' => $request->categoria,
            'promocion' => $request->has('promocion'),
        ]);

        return redirect()->route('admin.productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        if ($producto->imagen) {
            Storage::disk('public')->delete('imagenes_productos/' . $producto->imagen);
        }

        $producto->delete();

        return redirect()->route('admin.productos.index')->with('success', 'Producto eliminado correctamente.');
    }

    public function togglePromocion($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update(['promocion' => !$producto->promocion]);

        return redirect()->route('admin.productos.index')->with('success', 'Estado de promoción actualizado.');
    }
}
