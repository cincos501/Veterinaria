<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    // Mostrar todas las citas del cliente
    public function index()
    {
        $citas = Cita::where('user_id', Auth::id())->get();
        return view('cliente.citas.index', compact('citas'));
    }

    // Mostrar formulario para crear una nueva cita
    public function create()
    {
        // Obtener todos los servicios disponibles
        $servicios = Servicio::all();
        return view('cliente.citas.create', compact('servicios'));
    }

    // Almacenar una nueva cita
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required|date_format:H:i',
            'servicio' => 'required|exists:servicios,id',
        ]);

        // Unir fecha y hora en un solo campo
        $fechaHora = $request->fecha . ' ' . $request->hora;

        Cita::create([
            'user_id' => Auth::id(),
            'servicio_id' => $request->servicio,
            'fecha_hora' => $fechaHora,
            'estado' => 'pendiente',
        ]);

        return redirect()->route('cliente.citas.index')->with('success', 'Cita creada correctamente.');
    }

    // Mostrar el formulario para editar una cita
    public function edit(Cita $cita)
    {
        // Verificar que la cita pertenece al usuario autenticado
        if ($cita->user_id !== Auth::id()) {
            return redirect()->route('cliente.citas.index')->with('error', 'No tienes permiso para editar esta cita.');
        }

        $servicios = Servicio::all();
        return view('cliente.citas.edit', compact('cita', 'servicios'));
    }

    // Actualizar cita
    public function update(Request $request, Cita $cita)
    {
        $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required|date_format:H:i',
            'servicio' => 'required|exists:servicios,id',
        ]);

        // Verificar que la cita pertenece al usuario autenticado
        if ($cita->user_id !== Auth::id()) {
            return redirect()->route('cliente.citas.index')->with('error', 'No tienes permiso para actualizar esta cita.');
        }

        $fechaHora = $request->fecha . ' ' . $request->hora;

        $cita->update([
            'servicio_id' => $request->servicio,
            'fecha_hora' => $fechaHora,
        ]);

        return redirect()->route('cliente.citas.index')->with('success', 'Cita actualizada correctamente.');
    }

    // Cancelar o eliminar cita
    public function destroy(Cita $cita)
    {
        // Verificar que la cita pertenece al usuario autenticado
        if ($cita->user_id !== Auth::id()) {
            return redirect()->route('cliente.citas.index')->with('error', 'No tienes permiso para eliminar esta cita.');
        }

        $cita->delete();
        return redirect()->route('cliente.citas.index')->with('success', 'Cita cancelada correctamente.');
    }
}
