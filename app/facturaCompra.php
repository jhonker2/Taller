<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facturaCompra extends Model
{
    protected $fillable = [
        'idProveedor',
        'fecha',
        'subtotal',
        'iva12',
        'iva0',
        'descuento',
        'totalPagar',
        'repartidor',
        'descripcionCarro',
        ];

        public function detalleFacturaMateriaPrimas(){
    	return $this->hasMany(detalle_factura_materia_primas::class);
        } 
        
}
