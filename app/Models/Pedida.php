<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedida extends Model
{
    use HasFactory;
    protected $table='pedidas';
    protected $fillable=[
        'id_user',
        'id_producto',
        'estado',
        'entrega',
        'precio',
        'tamaño',
        'sabor',
        'color',
        'escrito',
        'especial',
    ];


    public function producto(){
        return $this->belongsTo(Producto::class,'id_producto');
    }
    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
}
