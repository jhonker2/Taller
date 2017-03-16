<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoriaUser extends Model
{
  
protected $fillable = [
        'tipoUser'
    ];


  public function User(){
    	return $this->hasMany(User::class);
    }  
}
