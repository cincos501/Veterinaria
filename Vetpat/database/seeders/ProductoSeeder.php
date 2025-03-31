<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        Producto::create(['nombre' => 'Collar de cuero', 'descripcion' => 'Tamaño mediano', 'precio' => 30.00, 'stock' => 10, 'imagen' => 'collar.jpg']);
        Producto::create(['nombre' => 'Comida para perros', 'descripcion' => 'Bolsa de 10kg', 'precio' => 150.00, 'stock' => 5, 'imagen' => 'comida.jpg']);
    }
}
