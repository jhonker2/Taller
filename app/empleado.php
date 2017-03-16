<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
protected $fillable = [
        'cedula',
        'cargo',
        'fechaContratacion',
        'salario',
        'estatus',
        'estadoCivil',
        'cargaFamiliar',
        'foto'
      ];

      public function rolPagos(){
    	return $this->hasMany(rolPago::class);
    } 
     public function personas(){
    	return $this->belongsto(persona::class);
    } 


}
