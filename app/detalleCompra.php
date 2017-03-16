<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalleCompra extends Model
{
    protected $fillable = [
        'idPersona',
        'idRol',
        'cargo',
      ];
}
