<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class maquinaria extends Model
{
   protected $fillable = [
        'maquina',
        'marca',
        'modelo',
        'stock',
        'precio',
        'fechaIngreso',
        'fechaDeterioro',
        'idEmpleado'
       ];

       
}
