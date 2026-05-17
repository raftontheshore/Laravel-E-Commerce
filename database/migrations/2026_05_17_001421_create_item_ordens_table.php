<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('item_ordenes', function (Blueprint $table) {
        $table->id();
        
        // Claves foráneas
        $table->foreignId('id_orden')->constrained('ordenes');
        $table->foreignId('id_producto')->constrained('productos');
        
        $table->integer('cantidad');
        $table->decimal('precio_unitario', 10, 2);
        $table->decimal('subtotal', 10, 2);
        
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_ordens');
    }
};
