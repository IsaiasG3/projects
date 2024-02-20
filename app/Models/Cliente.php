<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table='clientes'; //Para que busque la tabla clientes

    protected $fillable=[   //Campos que tiene la tabla
        'nombre',
        'apellidos',
        'empresa',
        'numero',
        'correo'
    ];

    public function colaboradores(){  //Relación de que tiene muchos colaboradores
        return $this->hasMany(Colaborador::class,'id_cliente'); //tiene muchos
    }
}
