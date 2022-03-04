<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table='usuarios';
    protected $primaryKey='id_usuario';
    public $incrementing=true;
    public $timestamps=false;
    protected $fillable=[
    	'id_usuario',
    	'usuario_interno',
    	'contrasenia'
    ];
    
}
