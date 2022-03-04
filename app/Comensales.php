<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comensales extends Model
{
    protected $table='comensales';
    protected $primaryKey='rfc';
    public $incrementing=true;
    public $timestamps=false;
    protected $fillable=[
    	'rfc',
    	'nombre',
    	'apellido',
        'fecha_cumpleaños',
        'correo_electronico',
        'telefono',
        'nickname'
    ];
    
}
