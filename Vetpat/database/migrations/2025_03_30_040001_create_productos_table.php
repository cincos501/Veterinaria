<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->decimal('precio', 8, 2);
            $table->integer('stock');
            $table->string('imagen')->nullable();
            $table->enum('categoria', ['Medicamentos', 'Higiene y Cuidado', 'Alimentos y Suplementos', 'Cuidado y Alojamiento', 'Juguete']);
            $table->timestamps();
        });
        
    }
    
    public function down()
    {
        Schema::dropIfExists('productos');
    }
    
};
