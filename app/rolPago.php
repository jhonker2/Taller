<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rolPago extends Model
{

protected $fillable = [
        'mes',
        'cedula',
        'sueldo',
        'horasExtras',
        'comisiones',
        'aportesIees',
        'totalDescuento',
        'totalSueldo',
      ];

      public function empleados(){
    	return $this->hasMany(empleado::class);
    } 
}
