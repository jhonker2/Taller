<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proforma extends Model
{
       protected $fillable = [
        'idCliente',
        'fecha',
        'subtotal',
        'iva0',
        'iva12',
        'descuento',
        'totalPagar',
        'estado_proforma'
        ];

   public function Detalle_proformas(){
    	return $this->hasmany(proforma::class);
    } 

    public function detalleFacturaServicio(){
    	return $this->hasmany(detalleFacturaServicio::class);
    } 
}
