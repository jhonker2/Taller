<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_proformas extends Model
{
   protected $fillable = [
        'idFactura',
        'cantidad',
        'idProducto',
        'precioUnitario',
        'subtotal'
        ];

    public function proformas(){
    	return $this->belongsto(proforma::class);
    } 
    public function productos(){
    	return $this->belongsto(producto::class);
    }

    public function facturaCompras(){
        return $this->belongsto(facturaCompra::class);
    } 
}
