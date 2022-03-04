<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Reservaciones;
use Session;

class ApiReservacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Reservaciones::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservacion=new Reservaciones;
        $reservacion->rfc=Session::get('usuario');
        $reservacion->folio=$request->get('folio');
        $reservacion->horario=$request->get('hora');
        $reservacion->fecha=$request->get('fecha');
        $reservacion->id_mesa=$request->get('id_mesa');
        $reservacion->factura=$request->get('factura');
        $reservacion->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $reservacion=Reservaciones::find($id);
        return $reservacion;
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
        $reservacion = Reservaciones::find($id);
        $reservacion->horario=$request->get('hora');
        $reservacion->fecha=$request->get('fecha');
        $reservacion->id_mesa=$request->get('id_mesa');
        $reservacion->factura=$request->get('factura');
        
        $reservacion->update();
     
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
