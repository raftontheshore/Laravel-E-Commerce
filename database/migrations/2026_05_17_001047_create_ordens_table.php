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
    Schema::create('ordenes', function (Blueprint $table) {
        $table->id();
        
        // Clave foránea al usuario que hace la compra
        $table->foreignId('id_usuario')->constrained('users');
        
        $table->decimal('total', 10, 2);
        
        // Estados básicos para un pedido
        $table->enum('estado', ['pendiente', 'pagado', 'enviado', 'entregado', 'cancelado'])->default('pendiente');
        
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordens');
    }
};
