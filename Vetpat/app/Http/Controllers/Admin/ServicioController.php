<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $servicios = Servicio::when($search, function ($query, $search) {
            return $query->where('nombre', 'like', "%{$search}%")
                         ->orWhere('descripcion', 'like', "%{$search}%");
        })
        ->paginate(10);

        return view('admin.servicios.index', compact('servicios'));
    }

    public function create()
    {
        return view('admin.servicios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'requisitos' => 'nullable|string',
            'promocion' => 'nullable|boolean',
        ]);

        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('images', 'public');
            $imagenPath = basename($imagenPath);
        }

        Servicio::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen' => $imagenPath,
            'requisitos' => $request->requisitos,
            'promocion' => $request->promocion ?? false,
        ]);

        return redirect()->route('admin.servicios.index')->with('success', 'Servicio agregado correctamente.');
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('admin.servicios.edit', compact('servicio'));
    }

    public function update(Request $request, $id)
    {
        $servicio = Servicio::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'requisitos' => 'nullable|string',
            'promocion' => 'nullable|boolean',
        ]);

        $imagenPath = $servicio->imagen;
        if ($request->hasFile('imagen')) {
            if ($servicio->imagen) {
                Storage::delete('public/images/' . $servicio->imagen);
            }
            $imagenPath = $request->file('imagen')->store('images', 'public');
            $imagenPath = basename($imagenPath);
        }

        $servicio->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen' => $imagenPath,
            'requisitos' => $request->requisitos,
            'promocion' => $request->promocion ?? $servicio->promocion,
        ]);

        return redirect()->route('admin.servicios.index')->with('success', 'Servicio actualizado correctamente.');
    }

    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);

        if ($servicio->imagen) {
            Storage::delete('public/images/' . $servicio->imagen);
        }

        $servicio->delete();

        return redirect()->route('admin.servicios.index')->with('success', 'Servicio eliminado correctamente.');
    }

    public function togglePromocion($id)
    {
        $servicio = Servicio::find($id);

        if ($servicio) {
            $servicio->promocion = !$servicio->promocion;
            $servicio->save();

            return redirect()->route('admin.servicios.index')->with('success', 'Estado de promoción actualizado');
        }

        return redirect()->route('admin.servicios.index')->with('error', 'Servicio no encontrado');
    }
}
