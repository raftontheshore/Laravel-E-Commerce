<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('carritos', function (Blueprint $table) {
        $table->id();
        
        // Claves foráneas
        $table->foreignId('id_usuario')->constrained('users');
        $table->foreignId('id_producto')->constrained('productos');
        
        $table->integer('cantidad');
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carritos');
    }
};
