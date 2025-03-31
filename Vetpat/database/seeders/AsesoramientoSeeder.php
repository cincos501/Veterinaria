<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Asesoramiento;

class AsesoramientoSeeder extends Seeder
{
    public function run()
    {
        Asesoramiento::create(['user_id' => 1, 'consulta' => '¿Cómo cuido mejor a mi gato?', 'estado' => 'pendiente']);
    }
}
