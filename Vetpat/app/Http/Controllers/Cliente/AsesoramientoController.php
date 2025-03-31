<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asesoramiento; // Asegúrate de que el modelo Asesoramiento existe.

class AsesoramientoController extends Controller
{
    // Mostrar los asesoramientos disponibles
    public function index()
    {
        // Obtener todos los asesoramientos de la base de datos
        $asesoramientos = Asesoramiento::all();

        // Pasar los asesoramientos a la vista
        return view('cliente.asesoramiento.index', compact('asesoramientos'));
    }

    // Crear un nuevo asesoramiento (opcional)
    public function create()
    {
        return view('cliente.asesoramiento.create');
    }

    // Almacenar un nuevo asesoramiento
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'tema' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        // Crear el nuevo asesoramiento
        Asesoramiento::create([
            'tema' => $request->tema,
            'descripcion' => $request->descripcion,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('cliente.asesoramiento.index')->with('success', 'Asesoramiento creado exitosamente.');
    }
}
