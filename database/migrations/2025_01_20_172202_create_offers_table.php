<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained('businesses')->onDelete('cascade'); // Relación con businesses
            $table->string('title'); // Título de la oferta
            $table->text('description'); // Descripción de la oferta
            $table->decimal('price', 8, 2); // Precio del producto
            $table->enum('audience', ['resident', 'tourist', 'both']); // Público objetivo
            $table->decimal('discount', 5, 2); // Descuento (ejemplo: 10.00%)
            $table->date('start_date'); // Fecha de inicio
            $table->date('end_date'); // Fecha de fin
            $table->boolean('status')->default(true); // Estado (activo o inactivo)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
