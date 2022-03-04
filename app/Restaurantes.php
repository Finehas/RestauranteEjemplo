<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurantes extends Model
{
    protected $table='restaurantes';
    protected $primaryKey='id_restaurante';
    public $incrementing=true;
    public $timestamps=false;
    protected $fillable=[
    	'id_restaurante',
    	'nombre_restaurante',
    	'horario_apertura',
        'horario_cierre'
    ];
    
}
