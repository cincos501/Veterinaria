<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cita;
use Carbon\Carbon;

class CitaController extends Controller
{
    public function index()
    {
        // Obtener todas las citas, primero las de hoy, luego por fecha
        $citas = Cita::with('user', 'servicio')
            ->orderByRaw("DATE(fecha_hora) = CURDATE() DESC")  // Mostrar las citas de hoy primero
            ->orderBy('fecha_hora')  // Ordenar por fecha
            ->get();

        return view('admin.citas.index', compact('citas'));
    }

    public function update(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);
        $cita->update(['estado' => $request->estado]);
        return redirect()->route('admin.citas.index')->with('success', 'Cita actualizada.');
    }
}
