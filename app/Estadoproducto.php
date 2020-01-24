<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadoproducto extends Model
{
    protected $table='estados_productos';
    protected $filetable=['nombre'];

    //Relacion con el modelo Producto
    public function productos(){
    	return $this->hasMany('App\Producto');
    }
}
