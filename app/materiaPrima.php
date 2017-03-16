<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class materiaPrima extends Model
{
     protected $fillable = [
        'material',
        'precio',
        'cantidad',
        'cantidad_medida',
        'unidadMedida',
        'stock',
        'descripcion',
    ];


    public function detalleFacturaMateriaPrimas(){
    	return $this->hasmany(detalle_factura_materia_primas::class);
    }  

    public function proveedores(){
    	return $this->belongsto(proveedore::class);
    } 
    public function detalleFacturaMaterialPrimas(){
    	return $this->hasmany(detalleMateriaPrima::class);
    }
}

