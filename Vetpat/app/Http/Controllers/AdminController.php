<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Cita;
use App\Models\Producto;
use App\Models\Asesoramiento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

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

        // Obtener los servicios más solicitados
        $serviciosSolicitados = Servicio::select('nombre', DB::raw('count(*) as total_solicitado'))
            ->join('citas', 'citas.servicio_id', '=', 'servicios.id')
            ->groupBy('nombre')
            ->orderByDesc('total_solicitado')
            ->take(5)
            ->get();

        // Obtener los usuarios con su rol desde la tabla 'users'
        $usuarios = User::all();

        return view('admin.dashboard', compact(
            'serviciosCount',
            'citasCount',
            'productosCount',
            'asesoramientosCount',
            'citasHoy',
            'serviciosSolicitados',
            'usuarios'
        ));
    }

    public function asignarRol($userId)
    {
        // Encontrar al usuario
        $user = User::findOrFail($userId);

        // Verificar si ya es administrador
        if ($user->rol === 'admin') {
            return redirect()->route('admin.dashboard')->with('error', 'Este usuario ya es administrador.');
        }

        // Asignar el rol de administrador
        $user->update(['rol' => 'admin']);

        return redirect()->route('admin.dashboard')->with('success', 'Rol de admin asignado con éxito.');
    }

    public function generarPDF()
    {
        // Obtener todos los productos
        $productos = Producto::all();

        // Generar el PDF con la vista 'admin.pdf.productos'
        $pdf = PDF::loadView('admin.pdf.productos', compact('productos'));

        return $pdf->download('productos.pdf');
    }
}
