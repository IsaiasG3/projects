<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table='productos';
    protected $fillable=[
        'nombre',
        'descripcion',
        'precio',
        'oferta',
        'creacion',
        'disponible',
        'vendidos',
        'metodoentrega',
        'metodopago',
        'id_usuario'
    ];

    
    public function usuario()
{
    return $this->belongsTo(User::class, 'id_usuario');
}
public function categorias()
{
    return $this->belongsToMany(Categoria::class, 'productocategorias', 'id_producto', 'id_categoria');
}
public function calificaciones()
{
    return $this->hasMany(Calificacion::class, 'id_usuario');
}
public function imagen()
{
    return $this->hasOne(ImagenProducto::class, 'id_producto');
}
public function imagenes()
{
    return $this->hasMany(ImagenProducto::class, 'id_producto');
}

public function ventas()
{
    return $this->belongsToMany(Venta::class, 'detalleventa', 'id_producto', 'id_venta')
        ->withPivot('cantidad', 'total');
}

public function compras()
{
    return $this->belongsToMany(Compra::class, 'detallecompra', 'id_producto', 'id_compra')
        ->withPivot('cantidad', 'total');
}

public function comentarios()
{
    return $this->hasMany(Comentario::class, 'id_producto');
}



}
