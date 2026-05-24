<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Producto extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_categoria',
        'nombre',
        'descripcion',
        'precio_original',
        'precio',
        'porcentaje_descuento',
        'stock',
        'stock_bajo',
        'url_imagen',
        'marca',
        'consola',
        'condicion',
        'activo',
    ];

    protected $casts = [
        'precio_original' => 'decimal:2',
        'precio' => 'decimal:2',
        'porcentaje_descuento' => 'integer',
        'stock' => 'integer',
        'stock_bajo' => 'integer',
        'activo' => 'boolean',
    ];

    // Relación con Categoría
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

   
    protected function urlImagen(): Attribute
    {
        return Attribute::make(
        get: fn($value) => $value 
            ? (Str::startsWith($value, 'http') ? $value : Storage::url($value))
            : null,
    );
    }
}
