<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asesoramiento;

class AsesoramientoController extends Controller
{
    public function index()
    {
        $asesoramientos = Asesoramiento::all();
        return view('admin.asesoramiento.index', compact('asesoramientos'));
    }

    public function create()
    {
        return view('admin.asesoramiento.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'contacto_whatsapp' => 'nullable|string|max:20',
        ]);

        Asesoramiento::create($request->all());

        return redirect()->route('admin.asesoramiento.index')->with('success', 'Asesoramiento agregado correctamente.');
    }

    public function edit($id)
    {
        $asesoramiento = Asesoramiento::findOrFail($id);
        return view('admin.asesoramiento.edit', compact('asesoramiento'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'contacto_whatsapp' => 'nullable|string|max:20',
        ]);

        $asesoramiento = Asesoramiento::findOrFail($id);
        $asesoramiento->update($request->all());

        return redirect()->route('admin.asesoramiento.index')->with('success', 'Asesoramiento actualizado correctamente.');
    }

    public function destroy($id)
    {
        Asesoramiento::destroy($id);
        return redirect()->route('admin.asesoramiento.index')->with('success', 'Asesoramiento eliminado.');
    }
}
