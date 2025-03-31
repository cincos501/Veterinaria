<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::with('user', 'servicio')->get();
        return view('admin.citas.index', compact('citas'));
    }

    public function update(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);
        $cita->update(['estado' => $request->estado]);
        return redirect()->route('admin.citas.index')->with('success', 'Cita actualizada.');
    }
}
