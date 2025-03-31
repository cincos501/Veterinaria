<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
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
            'requisitos' => 'nullable|string'
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
            'requisitos' => 'nullable|string'
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
}
