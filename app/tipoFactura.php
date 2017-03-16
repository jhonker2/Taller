<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoFactura extends Model
{
    protected $fillable = [
        'tipoFactura'
         ];

         public function facturaVentas(){
    	return $this->hasMany(factura::class);
    } 

    public function facturaCompras(){
    	return $this->hasMany(facturaCompra::class);
    } 
}
