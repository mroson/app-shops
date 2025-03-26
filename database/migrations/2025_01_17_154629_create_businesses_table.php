<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // 2025_01_17_123456_create_businesses_table.php

public function up()
{
    Schema::create('businesses', function (Blueprint $table) {
        $table->id();
        $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');
        $table->string('name');
        $table->string('email')->nullable();
        $table->text('description')->nullable();
        $table->string('address')->nullable();
        $table->string('phone')->nullable();
        $table->string('google_maps_url')->nullable();
        $table->timestamps();
    });
}

};
