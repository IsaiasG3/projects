<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;
    protected $table='mensajes';
    protected $fillable=[
        'id_usuarioe',
        'id_usuarior',
        'contenido',
        'fechaenvio'
    ];
    public function emisor()
    {
        return $this->belongsTo(Usuario::class, 'id_usuarioe');
    }

    public function receptor()
    {
        return $this->belongsTo(Usuario::class, 'id_usuarior');
    }
}
