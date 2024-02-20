<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
    use HasFactory;
    protected $table='datos';
    protected $fillable=[
        'id_usuario',
        'numero_cuenta',
       'banco',
      'titular',

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }
}
