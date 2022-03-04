<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesas extends Model
{
    protected $table='mesas';
    protected $primaryKey='id_mesa';
    public $incrementing=true;
    public $timestamps=false;
    protected $with=['restaurante','ubicacion'];
    protected $fillable=[
    	'id_mesa',
    	'numero_mesa',
    	'id_restaurante',
    	'id_ubicacion'
    ];

    public function restaurante(){
        return $this->belongsTo(Restaurantes::class,'id_restaurante','id_restaurante');
    }
    public function ubicacion(){
        return $this->belongsTo(Ubicaciones::class,'id_ubicacion','id_ubicacion');
    }
}
