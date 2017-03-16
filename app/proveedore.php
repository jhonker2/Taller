<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedore extends Model
{
   

   protected $fillable = [
        'nombreEmpresa','ruc','direccion','telefono','correo','representante','idCategoria',
    ];


       public function materiaPrimas(){
    	return $this->hasmany(materiaPrima::class);
    } 

    public function categoriaProveCllientes(){
    	return $this->belongsto(categoriaProveClliente::class);
    } 
}
