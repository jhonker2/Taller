<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle_factura_materia_primas extends Model
{
     protected $fillable = [
        'cantidad',
        'idMaterial',
        'precioUnitario',
        'subtotal',
        'idFactura'
         ];

        public function facturaVentas(){
    	return $this->belongsto(facturaVenta::class);
    } 

	    public function materiaPrimas(){
	    	return $this->belongsto(materialPrima::class);
	    } 

	    public function facturaCompras(){
        return $this->belongsto(facturaCompra::class);
    } 

}
