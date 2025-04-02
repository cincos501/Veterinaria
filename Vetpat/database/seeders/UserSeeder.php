<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon; // Asegúrate de importar Carbon

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@vetpat.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'email_verified_at' => Carbon::now(), 
        ]);

        // Cliente
        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@vetpat.com',
            'password' => Hash::make('cliente123'),
            'role' => 'cliente',
            'email_verified_at' => Carbon::now(), 
        ]);
    }
}
