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
    Schema::create('categorias', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 150);
        $table->text('descripcion')->nullable();
        $table->boolean('activo')->default(true);
        $table->timestamps(); // Crea created_at y updated_at, nuevo
        $table->softDeletes(); // Crea el campo deleted_at, nuevo
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
