<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;
    protected $table='colaboradores'; //Buscar tabla colaboradores

    protected $fillable=[ //Campos de la tabla
        'nombres',
        'apellidos',
        'numero',
        'estado',
        'id_cliente'

    ];
//Pertene a un cliente
    public function cliente(){
        return $this->belongsTo(Cliente::class,'id_cliente');
    }

}
