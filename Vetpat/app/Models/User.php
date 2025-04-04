<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role']; // Cambiado 'rol' a 'role'

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'user_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            Cliente::create([
                'user_id' => $user->id,
                'telefono' => 'No registrado',
                'direccion' => 'No registrada'
            ]);
        });
    }
    
}

