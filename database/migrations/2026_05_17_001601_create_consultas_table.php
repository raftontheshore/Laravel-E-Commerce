<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('consultas', function (Blueprint $table) {
        $table->id();
        
        // Clave foránea al usuario que hace la consulta
        $table->foreignId('id_usuario')->constrained('users');
        
        $table->string('asunto', 150);
        $table->text('mensaje');
        
        // Enum para el estado de la consulta
        $table->enum('estado', ['abierta', 'en_proceso', 'cerrada'])->default('abierta');
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
