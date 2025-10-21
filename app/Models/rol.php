<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    //
    protected $table = 'rol'; 
    protected $primaryKey = 'idRol';

    // public function rol()
    // {
    //     return $this->belongsTo(Rol::class, 'idRol'); // o App\Models\Rol si está en otro namespace
    // }
}
