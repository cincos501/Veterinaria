<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'servicio_id', 'fecha_hora', 'estado'];

    // Convertir fecha_hora a objeto Carbon automáticamente
    protected $casts = [
        'fecha_hora' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    // Método para obtener fecha formateada
    public function getFechaFormateadaAttribute()
    {
        return $this->fecha_hora ? Carbon::parse($this->fecha_hora)->format('d/m/Y H:i') : null;
    }
}
