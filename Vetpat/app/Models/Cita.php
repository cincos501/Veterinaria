<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'servicio_id', 'fecha_hora', 'estado'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function servicio() {
        return $this->belongsTo(Servicio::class);
    }
}
