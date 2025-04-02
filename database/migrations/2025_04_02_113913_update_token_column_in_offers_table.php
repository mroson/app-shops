<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {if (!Schema::hasColumn('offers', 'token')) {
        Schema::table('offers', function (Blueprint $table) {
            $table->uuid('token')->default(DB::raw('uuid()')); // Esto genera un UUID único por defecto
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropColumn('token'); // Si necesitas revertir, eliminamos la columna token
        });
    }
};

