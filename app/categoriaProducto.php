<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoriaProducto extends Model
{
   protected $fillable = [
        'tipoProducto'
    ];

    public function productos(){
    	return $this->hasMany(producto::class);
    } 

 }
