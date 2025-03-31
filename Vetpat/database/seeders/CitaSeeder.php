<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Cita;

class CitaSeeder extends Seeder
{
    public function run()
    {
        Cita::create(['user_id' => 1, 'servicio_id' => 1, 'fecha_hora' => now(), 'estado' => 'pendiente']);
    }
}
