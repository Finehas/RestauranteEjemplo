<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicaciones extends Model
{
    protected $table='ubicaciones';
    protected $primaryKey='id_ubicacion';
    public $incrementing=true;
    public $timestamps=false;
    protected $fillable=[
    	'id_ubicacion',
    	'descripcion'
    ];
    
}
