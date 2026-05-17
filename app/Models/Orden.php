<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Orden extends Model
{
    // Le decimos a Laravel el nombre exacto de la tabla
    protected $table = 'ordenes';

    protected $fillable = [
        'id_usuario',
        'total',
        'estado',
    ];

    protected $casts = [
        'total' => 'decimal:2',
    ];

    // Relación: Una orden pertenece a un usuario
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}