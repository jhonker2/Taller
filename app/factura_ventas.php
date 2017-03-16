<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class factura_ventas extends Model
{
  protected $fillable = [
        'idCliente',
        'fecha',
        'subtotal',
        'iva0',
        'iva12',
        'descuento',
        'totalPagar',
        'tipoFactura',
        ];

   public function detalleFacturaProductos(){
    	return $this->hasmany(detalle_facturas_productos::class);
    } 

    public function detalleFacturaServicio(){
    	return $this->hasmany(detalleFacturaServicio::class);
    } 
}
