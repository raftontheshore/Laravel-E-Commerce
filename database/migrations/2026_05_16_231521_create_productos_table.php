<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            // Clave foránea relacionada con categorias
            $table->foreignId('id_categoria')->constrained('categorias');

            $table->string('nombre', 150);
            $table->text('descripcion')->nullable();
            $table->decimal('precio_original', 10, 2)->nullable();
            $table->decimal('precio', 10, 2);
            $table->integer('porcentaje_descuento')->default(0);
            $table->integer('stock')->default(0);
            $table->integer('stock_bajo')->default(5);
            $table->string('url_imagen')->nullable();
            $table->string('marca')->nullable();
            $table->string('consola')->nullable();

            // Enum para la condición
            $table->enum('condicion', ['nuevo', 'usado', 'reacondicionado'])->default('usado');
            // Enum para tipo de producto
            $table->enum('tipo_producto', ['videojuego', 'consola', 'periferico'])->default('videojuego');

            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};