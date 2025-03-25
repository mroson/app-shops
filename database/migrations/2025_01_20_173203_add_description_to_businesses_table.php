<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToBusinessesTable extends Migration
{
    /**
     * Agregar la columna 'description' a la tabla 'businesses'.
     */
    public function up()
    {
        Schema::table('businesses', function (Blueprint $table) {
            // Agregar la columna 'description' después del campo 'name'
            $table->text('description')->nullable()->after('name');
        });
    }

    /**
     * Revertir los cambios eliminando la columna 'description'.
     */
    public function down()
    {
        Schema::table('businesses', function (Blueprint $table) {
            // Eliminar la columna 'description'
            if (Schema::hasColumn('businesses', 'description')) {
                $table->dropColumn('description');
            }
        });
    }
}
