<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    //
    protected $table = 'proveedores';
    protected $primaryKey = 'idProveedor';

    protected $fillable = ['nombre', 'nit','direccion','telefono','correo'];
}
