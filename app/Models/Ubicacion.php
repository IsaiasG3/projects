<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;
    protected $table='ubicacion';
    protected $fillable=[
        'id_usuario',
        'direccion',
        'ciudad',
        'estado',
        'tipo'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }




}
