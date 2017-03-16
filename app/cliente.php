<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
  protected $fillable = [
        'cedula'
             ];
  public function personas(){
    	return $this->belongsto(persona::class);
    }
}
