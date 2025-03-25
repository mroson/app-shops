<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Llave primaria autoincremental
            $table->string('name'); // Nombre del usuario
            $table->string('email')->unique(); // Correo electrónico único
            $table->string('password'); // Contraseña
            $table->string('phone', 15)->nullable(); // Teléfono, opcional
            $table->string('residence')->nullable(); // Lugar de residencia, opcional
            $table->string('country', 100)->nullable(); // País, opcional
            $table->string('instagram_username', 100)->nullable(); // Usuario de Instagram, opcional
            $table->timestamps(); // Campos 'created_at' y 'updated_at'
        });
    }

    public function down()
    {
        Schema::dropIfExists('users'); // Elimina la tabla en caso de rollback
    }
}
