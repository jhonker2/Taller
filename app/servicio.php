<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
   protected $fillable = ['id','servicio'];

         public function servicios(){
    	return $this->hasMany(servicio::class);
    } 
}
