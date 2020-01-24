<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $tabe = 'productos';
    protected $fillable = ['isbn','nombre','descripcion','precio','archivo','imagen','categoria_id','autor_id','tipo_id','estado_id'];


    //Relacion con el modelo Estadoproducto
    public function estado(){
    	return $this->belongsTo('App\Estadoproducto');
    }

    //Relacion con el modelo Categoria
    public function categoria(){
    	return $this->belongsTo('App\Categoria');
    }

    //Funcion scope para buscar por nombre
    public function scopeNombre($query,$nombre){
    	return $query->where('nombre','LIKE',"%$nombre%");
    }

   
    // Funcion scope para filtrar por categoria
    public function scopeCategoria($query,$categoria_id){
    	if($categoria_id)
    		return $query->where('categoria_id',$categoria_id);		
    }

    //Funcion scope para para filtrar por rango de precio precio
    public function scopePrecio($query,$desde,$hasta){
    	if($desde && $hasta)
    		return $query->whereBetween('precio',[$desde,$hasta]);
    	else if($desde)
    		return $query->where('precio','>=',$desde);
    	else if($hasta)
    		return $query->where('precio','<=',$hasta);
    	
    		

    }


}
