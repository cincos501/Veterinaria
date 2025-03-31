<?php

namespace App\Http\Controllers\Cliente;

use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        return view('cliente.servicios.index', compact('servicios'));
    }

    public function show($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('cliente.servicios.show', compact('servicio'));
    }
}
