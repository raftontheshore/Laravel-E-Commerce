<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    protected $table = 'productos';

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
        'tipo_producto',
        'activo',
    ];

    protected $casts = [
        'activo'               => 'boolean',
        'precio_original'      => 'decimal:2',
        'precio'               => 'decimal:2',
        'porcentaje_descuento' => 'integer',
        'stock'                => 'integer',
        'stock_bajo'           => 'integer',
    ];

    // Relación: un producto pertenece a una categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}