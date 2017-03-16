<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalleMaterialProducto extends Model
{
 protected $fillable = [
        'idMaterial',
        'idSolicitud',
        'cantidad',
        'unidadMedida',
    ];


    public function SolicitudPedido(){
    	return $this->belongsto(SolicitudPedido::class);

    } 

    public function materiaPrimas(){
    	return $this->belongsto(materiaPrima::class);

    } 
}
