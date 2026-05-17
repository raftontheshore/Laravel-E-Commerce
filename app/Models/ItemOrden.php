<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemOrden extends Model
{
    // Nombre exacto de la tabla
    protected $table = 'item_ordenes';

    protected $fillable = [
        'id_orden',
        'id_producto',
        'cantidad',
        'precio_unitario',
        'subtotal',
    ];

    protected $casts = [
        'precio_unitario' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    // Relación: Este ítem pertenece a una orden
    public function orden(): BelongsTo
    {
        return $this->belongsTo(Orden::class, 'id_orden');
    }

    // Relación: Este ítem corresponde a un producto
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}