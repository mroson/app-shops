<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStatusColumnInOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offers', function (Blueprint $table) {
            // Cambiar la columna `status` a un tipo ENUM con los valores 'active' e 'inactive'
            $table->enum('status', ['active', 'inactive'])->default('inactive')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offers', function (Blueprint $table) {
            // Revertir el cambio a tipo VARCHAR
            $table->string('status')->change();
        });
    }
}

