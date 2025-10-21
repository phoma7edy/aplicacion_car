<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    //
    protected $table = 'personas';
    protected $primaryKey = 'idPersona';
    protected $fillable = ['nombre', 'paterno','materno','ci','genero','correo','telefono','fechaRegistro'];

    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'idPersona','idPersona');
    }

    // public function usuario()
    // {
    //     return $this->hasOne(Usuario::class, 'idPersona','idPersona');
    // }
}
