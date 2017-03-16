<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
   protected $fillable = [
        'cedula',
        'apellidoPaterno',
        'apellidoMaterno',
        'nombre',
        'sexo',
        'estadoCivil',
        'direccion',
        'fechaNacimiento',
        'correo',
        'telefono'
       ];

       public function empleados(){
    	return $this->hasMany(empleado::class);
    } 
    public function clientes(){
      return $this->hasMany(cliente::class);
    }
}
