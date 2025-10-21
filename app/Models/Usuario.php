<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable

// class Usuario extends Model
{
    //
    protected $table = 'usuario';
    protected $casts = [
        'locked_until' => 'datetime', // 👈 convierte automáticamente a Carbon
    ];
    protected $primaryKey = 'idUsuario';

    
    protected $fillable = ['nomUsuario', 'password', 'fechaNacimiento', 'estado', 'idRol', 'idPersona'];

    public function persona()
    {
        return $this->belongsTo(Personas::class, 'idPersona', 'idPersona');
    }


    public function rol()
    {
        return $this->belongsTo(Rol::class, 'idRol');
    }
    // public function usuario()
    // {
    //     return $this->hasOne(Usuario::class);
    // }
}
