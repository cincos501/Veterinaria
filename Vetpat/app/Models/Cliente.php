<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla (opcional)
    protected $table = 'clientes'; // Si tu tabla se llama 'clientes' y no 'cliente'

    // Columnas que pueden ser asignadas masivamente
    protected $fillable = ['user_id', 'telefono', 'direccion'];

    // Configuración para el manejo de timestamps si no deseas usarlos puedes poner 'false'
    public $timestamps = true;

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
