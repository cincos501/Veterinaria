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
use App\Http\Controllers\Cliente\CompraController;
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

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Registro
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register.submit');

// Pantalla de presentación
Route::get('/splash', function () {
    return view('splash'); 
})->name('splash');

// Redirección después del login
Route::get('/home', function () {
    return redirect()->route('auth.login');
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

    Route::post('/usuarios/{user}/asignar-rol', [AdminController::class, 'asignarRol'])->name('usuario.asignarRol');
    Route::post('/usuarios/{user}/remover-rol', [AdminController::class, 'removerRol'])->name('usuario.removerRol');

    // Alternar promoción
    Route::put('/productos/{id}/toggle-promocion', [AdminProductoController::class, 'togglePromocion'])->name('productos.togglePromocion');
    Route::put('/servicios/{id}/toggle-promocion', [AdminServicioController::class, 'togglePromocion'])->name('servicios.togglePromocion');
});

 /*
|---------------------------------------------------------------------------
| Rutas para Cliente (Protegidas por Auth)
|---------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('cliente')->name('cliente.')->group(function () {
    Route::get('/dashboard', [ClienteController::class, 'dashboard'])->name('dashboard');
    Route::get('/compras/{compra_id}/factura', [ClienteController::class, 'exportarFactura'])->name('cliente.exportarFactura');
    Route::get('/perfil', [ClienteController::class, 'perfil'])->name('perfil');
    Route::post('/perfil/actualizar', [ClienteController::class, 'actualizarPerfil'])->name('actualizarPerfil');
    // Ruta para exportar la factura en PDF
Route::get('/cliente/compras/{compra_id}/factura', [ClienteController::class, 'exportarFactura'])->name('cliente.exportarFactura');

    Route::resource('servicios', ClienteServicioController::class);
    Route::resource('citas', ClienteCitaController::class);
    Route::resource('productos', ClienteProductoController::class);
    Route::resource('asesoramiento', ClienteAsesoramientoController::class);

    // Rutas para compras
    Route::post('/comprar/{producto}', [ClienteProductoController::class, 'crearCompra'])->name('comprar');
    Route::get('/compras/resumen', [ClienteProductoController::class, 'verResumen'])->name('producto.resumen');
    Route::post('/compras/pagar/{compra}', [ClienteProductoController::class, 'procesarPago'])->name('producto.pagar');
    Route::get('/compras/factura/{compra}', [ClienteProductoController::class, 'generarFactura'])->name('producto.factura');
});
