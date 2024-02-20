<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoCategoria extends Model
{
    use HasFactory;
    protected $table='productocategorias';
    protected $fillable=[
        'id_producto',
        'id_categoria'
    ];
    public function producto()
{
    return $this->belongsTo(Producto::class, 'id_producto');
}

public function categoria()
{
    return $this->belongsTo(Categoria::class, 'id_categoría');
}
}
