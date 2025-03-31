<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesoramiento extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'contenido', 'contacto_whatsapp'];
}
