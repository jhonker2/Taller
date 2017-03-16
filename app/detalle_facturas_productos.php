<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle_facturas_productos extends Model
{
     protected $fillable = [
        'idFactura',
        'cantidad',
        'idProducto',
        'precioUnitario',
        'subtotal'
        ];

         public function facturaVentas(){
    	return $this->belongsto(factura_ventas::class);
    } 
     public function productos(){
    	return $this->belongsto(producto::class);
    }

    public function facturaCompras(){
        return $this->belongsto(facturaCompra::class);
    } 
}
