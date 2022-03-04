<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Comensales;
use Session;
use Redirect;
use Cookie;
use Cache;

class ApiComensalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comensales::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validación de los rfcs
        $rfc=$request->get('rfc');

        $validacion = Comensales::where('rfc','=',$rfc)
        ->get();


        if (count($validacion)>0) {
            return $juan=1;
        } else {
            $comensal=new Comensales;
            //poner dato para la sesion//
            $user=$request->get('rfc');
            //Crear objeto para guardar
            $comensal->rfc=$request->get('rfc');
            $comensal->nombre=$request->get('nombre');
            $comensal->apellido=$request->get('apellido');
            $comensal->correo_electronico=$request->get('correo');
            $comensal->telefono=$request->get('telefono');
            $comensal->nickname=$request->get('nickname');
            $comensal->fecha_cumpleaños=$request->get('fecha');
            $comensal->save();
            return $juan=0;
            //Sesion creada//
            Session::put('usuario',$user);
            
            }

         
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $comensal=Comensales::find($id);
        return $comensal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
   
}
