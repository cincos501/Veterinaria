<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function dashboard()
    {
        return view('cliente.dashboard');
    }

    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'telefono' => 'required|string',
            'direccion' => 'required|string',
        ]);

        Cliente::create([
            'user_id' => Auth::id(),
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
        ]);

        return redirect()->route('cliente.dashboard')->with('success', 'Cliente registrado con éxito.');
    }
}
