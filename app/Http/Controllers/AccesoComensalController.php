<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comensales;
use Session;
use Redirect;
use Cookie;
use Cache;

class AccesoComensalController extends Controller
{
      public function validar(Request $request){


    	$rfc=$request->rfc;
    	$nick=$request->nick;


    	$resp = Comensales::where('rfc','=',$rfc)
    	->where('nickname','=',$nick)
    	->get();

    	//return $resp;

        

    	if (count($resp)>0) 
        {
            $user=$resp[0]->rfc;
             Session::put('usuario',$user);           
            return Redirect::to('bienvenida');
        }
    	else
    	{
    		return Redirect::to('sesionerror');
    	}
     
    	
    }

   
    
}
