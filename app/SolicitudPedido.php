<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudPedido extends Model
{
    protected $fillable = [
        'cantidad',
        'idMaterial',
        'UnidadMedida',
        'fechaPedido',
        'fechaEntrega',
        'elaboradoPor',
        'encargadoBodega',
        'estado',
        'idEmpleado',
      ];


      public function empleado(){
    	return $this->hasMany(empleado::class);
    } 
    public function materiaPrima(){
        return $this->hasMany(materiaPrima::class);
    } 
}
