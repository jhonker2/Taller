<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $fillable = [
        'idCategoria','producto','stock','medida','precio','descripcion'
    ];


    public function categoriaProductos(){
    	return $this->belongsto(categoriaProducto::class);

    } 
    public function materialProducto(){
    	return $this->hasmany(materialProducto::class);
    	
    } public function detalleFacturaVentas(){
        return $this->hasmany(detalleFacturaVenta::class);
        
    } 
}
