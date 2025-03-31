<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Servicio;

class ServicioSeeder extends Seeder
{
    public function run()
    {
        Servicio::create(['nombre' => 'Baño para perros', 'descripcion' => 'Incluye shampoo especial.', 'precio' => 50.00]);
        Servicio::create(['nombre' => 'Esterilización', 'descripcion' => 'Para perros y gatos.', 'precio' => 200.00]);
    }
}
