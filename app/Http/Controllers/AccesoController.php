<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use Session;
use Redirect;
use Cookie;
use Cache;

class AccesoController extends Controller
{
      public function validar(Request $request){


    	$usuario=$request->user;
    	$password=$request->password;


    	$resp =Usuarios::where('usuario_interno','=',$usuario)
    	->where('contrasenia','=',$password)
    	->get();

    	//return $resp;

        

    	if (count($resp)>0) 
        {
            $user=$resp[0]->usuario_interno;

            Session::put('usuario',$user);
            return Redirect::to('bienvenida2');
        }
    	else
    	{
    		return Redirect::to('erroradmin');
    	}
        // return 'HOLA';
    	
    }

    public function salir(){
        Session::flush();
        Session::reflash();
        Cache::flush();
        Cookie::forget('laravel_session');
        unset($_COOKIE);
        unset($_SESSION);
        return Redirect::to('/');
    }
    
}
