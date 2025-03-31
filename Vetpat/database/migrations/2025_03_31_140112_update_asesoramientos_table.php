<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('asesoramientos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('contenido');
            $table->string('contacto_whatsapp')->nullable(); // Número de WhatsApp
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('asesoramientos');
    }
};
