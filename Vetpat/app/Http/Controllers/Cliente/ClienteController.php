<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Cita;
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

        // Obtener las compras del cliente autenticado con el nombre del usuario y la información del cliente
        $compras = Compra::where('user_id', Auth::id())
            ->with(['user.cliente']) // Cargar las relaciones
            ->get();

        // Obtener las citas futuras del cliente
        $citas = Cita::where('user_id', Auth::id())
                     ->where('fecha_hora', '>=', now())  // Citas futuras
                     ->orderBy('fecha_hora', 'asc')  // Ordenadas por fecha
                     ->get();

        return view('cliente.dashboard', compact('cliente', 'compras', 'citas'));
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
        // Validación
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:255',
            'password' => 'nullable|confirmed|min:6', // Contraseña opcional
        ]);
    
        // Actualizar los datos del usuario
        $user = Auth::user();
        $user->name = $request->nombre;
        $user->email = $request->email;
    
        // Si se proporciona una nueva contraseña, actualizarla
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->save();
    
        // Actualizar la información del cliente
        $cliente = Cliente::where('user_id', Auth::id())->first();
        if (!$cliente) {
            $cliente = Cliente::create([
                'user_id' => Auth::id(),
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
            ]);
        } else {
            $cliente->telefono = $request->telefono;
            $cliente->direccion = $request->direccion;
            $cliente->save();
        }
    
        return redirect()->route('cliente.dashboard')->with('success', 'Perfil actualizado con éxito.');
    }
}
