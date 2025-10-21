<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model

{
    protected $table = 'vehiculos';
    protected $primaryKey = 'idProducto';

    protected $fillable = ['nombre','modelo','marca','imagen_url','descripcion','placa', 'color','estado','nomCategoria'];

}
