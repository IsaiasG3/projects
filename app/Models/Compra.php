<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $table='compras';
    protected $fillable=[
        'id_usuario',
        'fechacompra',
        'total',
        'metodopago',
        'estado',
        'metodoentrega'

    ];
    public function vendedor()
    {
        return $this->belongsTo(User::class, 'id_vendedor');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'detallecompra', 'id_compra', 'id_producto')
            ->withPivot('cantidad', 'total');
    }

    public function detalleCompras()
    {
        return $this->hasMany(DetalleCompra::class, 'id_compra');
    }

}
