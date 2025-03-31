<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ServicioController as AdminServicioController;
use App\Http\Controllers\Admin\CitaController as AdminCitaController;
use App\Http\Controllers\Admin\ProductoController as AdminProductoController;
use App\Http\Controllers\Admin\AsesoramientoController as AdminAsesoramientoController;
use App\Http\Controllers\Cliente\ServicioController as ClienteServicioController;
use App\Http\Controllers\Cliente\CitaController as ClienteCitaController;
use App\Http\Controllers\Cliente\ProductoController as ClienteProductoController;
use App\Http\Controllers\Cliente\AsesoramientoController as ClienteAsesoramientoController;
use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\AuthController;

/*
|---------------------------------------------------------------------------
| Rutas de Autenticación
|---------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('splash');
});

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.submit');

// Logout (ahora definida correctamente)
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Registro (solo clientes)
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register.submit');

/*
|---------------------------------------------------------------------------
| Ruta para el Splash Screen (Redirigir al login o dashboard después)
|---------------------------------------------------------------------------
*/
//splash
Route::get('/splash', function () {
    return view('splash'); 
})->name('splash');

// Redirige a la página de login o al dashboard después del splash
Route::get('/home', function () {
    return redirect()->route('auth.login'); // O redirige al dashboard si ya estás autenticado
});

/*
|---------------------------------------------------------------------------
| Rutas para Administrador (Protegidas por Auth)
|---------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('servicios', AdminServicioController::class);
    Route::resource('citas', AdminCitaController::class);
    Route::resource('productos', AdminProductoController::class);
    Route::resource('asesoramiento', AdminAsesoramientoController::class);
});

/*
|---------------------------------------------------------------------------
| Rutas para Cliente (Protegidas por Auth)
|---------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('cliente')->name('cliente.')->group(function () {
    Route::get('/dashboard', [ClienteController::class, 'dashboard'])->name('dashboard');
    Route::resource('servicios', ClienteServicioController::class);
    Route::resource('citas', ClienteCitaController::class);
    Route::resource('productos', ClienteProductoController::class);
    Route::resource('asesoramiento', ClienteAsesoramientoController::class);
});