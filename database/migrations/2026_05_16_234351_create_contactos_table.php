<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('contactos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 100);
        $table->string('email', 150);
        $table->string('telefono', 20)->nullable();
        $table->string('asunto', 150);
        $table->text('mensaje');
        
        // Enum para saber en qué estado está la consulta
        $table->enum('estado', ['pendiente', 'leido', 'respondido'])->default('pendiente');
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
