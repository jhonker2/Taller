<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Session;
use Redirect;
use DB;
class LogController extends Controller
{
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoUser= DB::select('select tipoUser from users,categoria_users
			where users.idCategoria=categoria_users.id
			and users.user="'.$request['usuario'].'"');
        
        foreach ($tipoUser as $tipo) {
        	if($tipo->tipoUser=="administrador" or "Administrador"){
        		if(Auth::attempt(['user'=>$request['usuario'], 'password'=>$request['password']]) ) {
            		return "login";
        		}else{
            		return "fails";
	        	}	
        	}else{
        		if(Auth::attempt(['user'=>$request['usuario'], 'password'=>$request['password']]) ) {
	            	return "loginOtro";
        		}else{
    	        	return "failsOtro";
	        	}
        	}
        }
    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/');
    }


}
