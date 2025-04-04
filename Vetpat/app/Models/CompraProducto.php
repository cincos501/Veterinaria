<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraProducto extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'compra_producto';

    // Columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'compra_id',
        'producto_id',
        'cantidad',
        'precio',
    ];
}
