<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Método para mostrar el dashboard de administración
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
