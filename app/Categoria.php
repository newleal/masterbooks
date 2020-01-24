<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $table='categorias';
    protected $filetable=['nombre'];

    //Relacion con el modelo Producto

    public function producto(){
    	return $this->hasMany('App\Producto');
    }
}
