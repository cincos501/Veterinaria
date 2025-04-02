<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Muestra el dashboard del cliente autenticado.
     */
    public function dashboard()
    {
        // Buscar el cliente autenticado o crearlo si no existe
        $cliente = Cliente::firstOrCreate(
            ['user_id' => Auth::id()],
            ['telefono' => 'No registrado', 'direccion' => 'No registrada']
        );

        return view('cliente.dashboard', compact('cliente'));
    }

    /**
     * Muestra la vista del perfil del cliente.
     */
    public function perfil()
    {
        // Buscar el cliente con el ID del usuario autenticado
        $cliente = Cliente::where('user_id', Auth::id())->first();

        // Si no se encuentra, redirigir con un mensaje
        if (!$cliente) {
            return redirect()->route('cliente.dashboard')->with('error', 'Debes completar tu perfil antes de acceder.');
        }

        return view('cliente.perfil', compact('cliente'));
    }

    /**
     * Actualiza los datos del perfil del cliente autenticado.
     */
    public function actualizarPerfil(Request $request)
    {
        $request->validate([
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:255',
        ]);

        // Buscar al cliente
        $cliente = Cliente::where('user_id', Auth::id())->first();

        // Si no se encuentra, crearlo
        if (!$cliente) {
            $cliente = Cliente::create([
                'user_id' => Auth::id(),
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
            ]);
        } else {
            $cliente->update([
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
            ]);
        }

        return redirect()->route('cliente.dashboard')->with('success', 'Perfil actualizado con éxito.');
    }
}
