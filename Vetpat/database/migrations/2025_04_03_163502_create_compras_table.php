<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('total', 10, 2);
            $table->enum('estado', ['Pendiente', 'Completada']);
            $table->enum('tipo_entrega', ['recoger', 'enviar'])->default('recoger'); // Asignar valor predeterminado
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
