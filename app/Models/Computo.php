<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computo extends Model
{
    use HasFactory;

    protected $table='computos'; //Buscar tabla computos

    protected $fillable=[
        //campos
        'tipo',
        'serie',
        'folio',
        'cargador',
        'descripcion',
        'tipo',
        'id_colaborador'
    ];

    public function colaborador(){ //buscar el id de la tabla colaboradores
        return $this->belongsTo(Colaborador::class,'id_colaborador');
    }
    public function historial(){
        return $this->hasMany(Historial::class,'id_historial'); //tiene muchos historiales
    }
}
