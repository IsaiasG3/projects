<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;
    protected $table='calificacion';
    protected $fillable=[
        'id_usuario',
        'id_producto',
        'puntuacion'
    ];
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function producto()
{
    return $this->belongsTo(Producto::class, 'id_producto');
}

}
