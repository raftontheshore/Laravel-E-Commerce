<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VentaCabecera extends Model
{
    protected $table = 'ventas_cabecera';

    protected $fillable = [
        'user_id',
        'estado',
        'total',
        'fecha_venta',
        // Datos de entrega
        'direccion',
        'telefono',
        'codigo_postal',
        'notas',
    ];

    protected $casts = [
        'fecha_venta' => 'datetime',
    ];

    // Relación: una venta pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación: una venta tiene muchos items
    public function detalles()
    {
        return $this->hasMany(VentaDetalle::class, 'venta_id');
    }
}