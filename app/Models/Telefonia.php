<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefonia extends Model
{
    use HasFactory;

    protected $table='telefonias'; //ir a la tabla

    protected $fillable=[
        'modelo',
        'marca',
        'imci',
        'serie',
        'sim',
        'tel_cerebrit0',
        'id_colaborador'
    ];

    public function colaborador(){
        return $this->belongsTo(Colaborador::class,'id_colaborador');
    }
    public function historial(){
        return $this->hasMany(Historial::class,'id_historial'); //tiene muchos
    }
}
