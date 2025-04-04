<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'imagen', 'categoria', 'promocion'];

    // Método para obtener un nombre más amigable de la categoría
    public function getCategoriaNombreAttribute()
    {
        $categorias = [
            'medicamentos' => 'Medicamentos',
            'higiene' => 'Productos de Higiene y Cuidado',
            'alimentos' => 'Alimentos y Suplementos',
            'cuidado' => 'Productos para el Cuidado y Alojamiento',
            'juguetes' => 'Juguetes'
        ];

        

        return $categorias[$this->categoria] ?? 'Otro';
    }
    public function compras()
{
    return $this->belongsToMany(Compra::class, 'compra_producto')
                ->withPivot('cantidad', 'precio')
                ->withTimestamps();
}

    // Método para verificar si el stock es bajo
    public function esStockBajo($umbral = 5)
    {
        return $this->stock <= $umbral;
    }
}




