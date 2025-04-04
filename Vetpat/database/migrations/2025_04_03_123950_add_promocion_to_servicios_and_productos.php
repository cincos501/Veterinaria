<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Agregar la columna 'promocion' a la tabla 'servicios'
        Schema::table('servicios', function (Blueprint $table) {
            $table->boolean('promocion')->default(false)->after('precio');
        });

        // Agregar la columna 'promocion' a la tabla 'productos'
        Schema::table('productos', function (Blueprint $table) {
            $table->boolean('promocion')->default(false)->after('precio');
        });
    }

    public function down()
    {
        // Eliminar la columna 'promocion' de 'servicios'
        Schema::table('servicios', function (Blueprint $table) {
            $table->dropColumn('promocion');
        });

        // Eliminar la columna 'promocion' de 'productos'
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn('promocion');
        });
    }
};
