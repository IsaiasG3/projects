<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefoniaHistorial extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table='telefoniashistoriales'; //ir a tabla computohistoriales

    protected $fillable=[
        //campos
        'fecha_entrega',
        'estado',
        'fallas',
        'fecha_dev',
        'foto_sal1',
        'foto_sal2',
        'foto_sal3',
        'foto_sal4',
        'foto_dev1',
        'foto_dev2',
        'foto_dev3',
        'foto_dev4',
        'id_colaborador',
        'id_dispositivo'
    ];

    //id_dispositivo tomado de la tabla dispositivo campo id
    public function dispositivo(){
        return $this->belongsTo(Dispositivo::class,'id_dispositivo');
    }
    public function colaborador(){
        return $this->belongsTo(Colaborador::class,'id_colaborador');
    }
}
