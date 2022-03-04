<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservaciones extends Model
{
    protected $table='reservaciones';
    protected $primaryKey='id_reservacion';
    public $incrementing=true;
    public $timestamps=false;
    protected $with=['mesa','comensal'];
    protected $fillable=[
    	'id_reservacion',
    	'horario',
        'fecha',
    	'id_mesa',
    	'rfc',
        'factura',
        'folio'
    ];
    public function mesa(){
        return $this->belongsTo(Mesas::class,'id_mesa','id_mesa');
    }
    public function comensal(){
        return $this->belongsTo(Comensales::class,'rfc','rfc');
    }
}
