<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalleServicio extends Model
{
    protected $fillable = [
        'idFacura',
        'cantidad',
        'idServicio',
        'precioUnitario',
        'subtotal',
        'tipoEmpleado'

    ];


    public function facturaVentas(){
    	return $this->belongsto(facturaVenta::class);
    } 

    public function servicios(){
        return $this->belongsto(servicio::class);
    } 
}
