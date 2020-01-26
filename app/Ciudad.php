<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table='ciudades';
    protected $filetable=['nombre'];


    //relacion con la tabla Usuario
    public function usuarios(){
    	return $this->hasMany('App\Ciudad');
    }
}
