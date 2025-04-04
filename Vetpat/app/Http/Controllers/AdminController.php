<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Cita;
use App\Models\Producto;
use App\Models\Asesoramiento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Obtener estadísticas principales
        $serviciosCount = Servicio::count();
        $citasCount = Cita::count();
        $productosCount = Producto::count();
        $asesoramientosCount = Asesoramiento::count();

        // Obtener citas programadas para hoy
        $citasHoy = Cita::whereDate('fecha_hora', Carbon::today())->get();

        // Obtener los productos con stock bajo (menor o igual a 5)
        $productosBajoStock = Producto::where('stock', '<=', 5)->get();

        // Obtener los usuarios con su rol desde la tabla 'users'
        $usuarios = User::all();

        return view('admin.dashboard', compact(
            'serviciosCount',
            'citasCount',
            'productosCount',
            'asesoramientosCount',
            'citasHoy',
            'productosBajoStock',
            'usuarios'
        ));
    }

    public function asignarRol(Request $request, User $user)
    {
        // Evitar que un usuario se asigne a sí mismo como admin
        if (Auth::id() === $user->id) {
            return redirect()->route('admin.dashboard')->with('error', 'No puedes cambiar tu propio rol.');
        }

        // Verificar si ya es admin
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('error', 'Este usuario ya es administrador.');
        }

        // Asignar rol de admin
        $user->update(['role' => 'admin']);

        return redirect()->route('admin.dashboard')->with('success', 'Rol de admin asignado con éxito.');
    }

    public function removerRol(Request $request, User $user)
    {
        // Evitar que un usuario se elimine a sí mismo como admin
        if (Auth::id() === $user->id) {
            return redirect()->route('admin.dashboard')->with('error', 'No puedes remover tu propio rol.');
        }

        // Verificar si el usuario ya no es admin
        if ($user->role !== 'admin') {
            return redirect()->route('admin.dashboard')->with('error', 'Este usuario no es administrador.');
        }

        // Cambiar rol a cliente
        $user->update(['role' => 'cliente']);

        return redirect()->route('admin.dashboard')->with('success', 'Rol de admin removido con éxito.');
    }
}
