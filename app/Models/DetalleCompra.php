<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $table='detallecompra';
    protected $fillable=[
        'id_compra',
        'id_producto',
        'cantidad',
        'total',
        'id_ubicacion'

    ];

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'id_ubicacion');
    }
    public function compra()
{
    return $this->belongsTo(Compra::class, 'id_compra');
}

public function producto()
{
    return $this->belongsTo(Producto::class, 'id_producto');
}
}
