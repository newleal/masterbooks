<?php

namespace App\Http\Controllers\frontoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Producto;

class PaginasController extends Controller
{
	//Pagina inicio
    public function inicio(){
    	$productos = Producto::all();
    	return view('frontoffice.inicio',compact('productos')); 
    }
    /*
		public function detalle($di){
    	$productos = Producto::where($id)->get();
    	return view('frontoffice.detalle',compact('producto'));
    }
    */	
    
}
