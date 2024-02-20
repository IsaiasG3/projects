<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Models\Ubicacion;

class User extends Authenticatable implements CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'telefono',
        'password',
        'imagen',
        'role',
    ];
    public function ubicaciones()
{
    return $this->hasMany(Ubicacion::class, 'id_usuario');
}

    public function productos()
{
    return $this->hasMany(Producto::class, 'id_usuario');
}
public function productosVendidos()
    {
        return $this->hasMany(Producto::class, 'id_usuario');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'id_usuario');
    }

    public function compras()
    {
        return $this->hasMany(Compra::class, 'id_usuario');
    }

    public function mensajesEnviados()
    {
        return $this->hasMany(Mensaje::class, 'id_usuarioe');
    }

    public function mensajesRecibidos()
    {
        return $this->hasMany(Mensaje::class, 'id_usuarior');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_usuario');
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class, 'id_usuario');
    }

        public function domicilios()
    {
        return $this->hasMany(Ubicacion::class, 'id_usuario');
    }
    public function dato()
    {
        return $this->hasOne(Dato::class, 'id_usuario', 'id');
    }
    public function ubicacionVenta()
{
    return $this->hasOne(Ubicacion::class, 'id_usuario')->where('tipo', 'venta');
}

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }


}
