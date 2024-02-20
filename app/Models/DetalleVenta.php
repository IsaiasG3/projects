<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $table='detalleventa';
    protected $fillable=[
        'id_venta',
        'id_producto',
        'cantidad',
        'total',
        'id_ubicacion'
    ];
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'id_ubicacion');
    }
    public function venta()
{
    return $this->belongsTo(Venta::class, 'id_venta');
}

public function producto()
{
    return $this->belongsTo(Producto::class, 'id_producto');
}
}
