<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table='ventas';
    protected $fillable=[
        'id_usuario',
        'fechaventa',
        'total',
        'estado',
    ];
    public function comprador()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'detalleventa', 'id_venta', 'id_producto')
            ->withPivot('cantidad', 'total');
    }
}
