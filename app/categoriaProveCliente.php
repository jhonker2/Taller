<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoriaProveCliente extends Model
{

	protected $fillable = [
        'categoria_prove_clliente'
    ];

    public function proovedores(){
    	return $this->hasMany(proveedore::class);
    } 

    public function facturas(){
    	return $this->hasMany(factura::class);
    } 

}
