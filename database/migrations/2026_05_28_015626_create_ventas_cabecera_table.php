<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ventas_cabecera', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_venta')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('estado')->default('carrito');
            // 'carrito' = en proceso | 'confirmado' = compra realizada
            $table->decimal('total', 10, 2)->default(0);

            // Datos de entrega
            $table->string('direccion')->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('codigo_postal', 10)->nullable();
            $table->text('notas')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventas_cabecera');
    }
};