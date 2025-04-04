<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total', 'estado', 'tipo_entrega'];

    // Relación con User (para acceder al cliente desde el usuario)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con productos (tu relación ya está correcta)
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'compra_producto') // Asegura que sea 'compra_productos'
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }
}
