<?php

namespace App\Http\Controllers\backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;
//use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\View;
use App\Mail\ProductoCreado;
use App\Producto;
use App\Categoria;
use App\Autor;
use App\Estadoproducto;
use App\Tipo;

class ProductosController extends Controller
{
    //Listar los productos
    public function index(Request $request)
    {
        //$productos = Producto::all();
        //return view('backoffice.productos.index',compact('productos'));

        $categorias = Categoria::all();
        $productos = Producto::nombre($request->nombre)
                    ->categoria($request->categoria)
                    ->precio($request->desde,$request->hasta)->paginate(1);
        return view('backoffice.productos.index',compact('productos','categorias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $autores = Autor::all();
        $tipos = Tipo::all();
        $estados = Estadoproducto::all();
        return view('backoffice.productos.crear',compact('categorias','autores','tipos','estados'));
    }

    //Función para guardar un producto
    public function store(Request $request)
    {
        
        //Validar los campos
        $request->validate([
            'isbn'=>'required|max:100',
            'nombre'=>'required|max:100',
            'precio'=>'required|numeric',
            'imagen' => 'required|mimes:jpeg,jpg,png',
            'archivo' => 'mimes:pdf|max:10000',
            'categoria_id' => 'required',
            'autor_id' => 'required',
            'tipo_id' => 'required',
            'estado_id' => 'required'
        ]);

        //Subir la imagen al servidor
        $nombreimg = "";
        if($request->file('imagen')){
            $imagen = $request->file('imagen');
            $ruta = public_path().'/imgproductos';
            $nombreimg = uniqid()."-".$imagen->getClientOriginalName();
            $imagen->move($ruta,$nombreimg);
        }

        //Subir el pdf al servidor
        $nombrepdf = "";
        if($request->file('archivo')){
            $archivo = $request->file('archivo');
            $ruta = public_path().'/libros';
            $nombrepdf = uniqid()."-".$archivo->getClientOriginalName();
            $archivo->move($ruta,$nombrepdf);
        }

        //Insertarlos en la base de datos
        $producto = Producto::create([
            'isbn'=>$request->isbn,
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'precio'=>$request->precio,
            'imagen'=>$nombreimg,
            'archivo'=>$nombrepdf,
            'categoria_id'=>$request->categoria_id,
            'autor_id'=>$request->autor_id,
            'tipo_id'=>$request->tipo_id,
            'estado_id'=>$request->estado_id
        ]);

        //envia Email
        $emailrx = 'lealb.miguelangel@gmail.com';
        $nombre = $request->nombre;
        $precio = $request->precio;
        Mail::to('lealb.miguelangel@gmail.com')->send(new ProductoCreado($nombre,$precio));

        return redirect()->route('productos.index');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        $autores = Autor::all();
        $tipos = Tipo::all();
        $estados = Estadoproducto::all();
        return view('backoffice.productos.editar',compact('producto','categorias','autores','tipos','estados'));
    }

    //Función para actualizar
    public function update(Request $request, $id)
    {
        //Validar los campos
        $request->validate([
            'isbn'=>'required|max:100',
            'nombre'=>'required|max:100',
            'precio'=>'required|numeric',
            'imagen' => 'mimes:jpeg,jpg,png',
            'archivo' => 'mimes:pdf|max:10000',
            'categoria_id' => 'required',
            'autor_id' => 'required',
            'tipo_id' => 'required',
            'estado_id' => 'required'
        ]);

        //Subir la imagen al servidor
        $nombreimg = "";
        if($request->file('imagen')){
            $imagen = $request->file('imagen');
            $ruta = public_path().'/imgproductos';
            $nombreimg = uniqid()."-".$imagen->getClientOriginalName();
            $imagen->move($ruta,$nombreimg);
        }

        //Subir el pdf al servidor
        $nombrepdf = "";
        if($request->file('archivo')){
            $archivo = $request->file('archivo');
            $ruta = public_path().'/libros';
            $nombrepdf = uniqid()."-".$archivo->getClientOriginalName();
            $archivo->move($ruta,$nombrepdf);
        }


        $producto = Producto::find($id);
        $producto->isbn = $request->isbn;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        if($request->file('imagen'))
            $producto->imagen = $nombreimg;
        if($request->file('archivo'))
            $producto->archivo = $nombrepdf;
        $producto->categoria_id = $request->categoria_id;
        $producto->autor_id = $request->autor_id;
        $producto->tipo_id = $request->tipo_id;
        $producto->estado_id = $request->estado_id;
        $producto->save();

        return redirect()->route('productos.index');
    }

    public function inactivar($id){
        $producto = Producto::find($id);
        $producto->estado_id = 3;
        $producto->save();
        return redirect()->route('productos.index')->with('status','Inactivo'.$producto->nombre.' inactivado con éxito!');
    }

    /**
     * Activa un usuario especifico
     */
    public function activar($id){
        $producto = Producto::find($id);
        $producto->estado_id = 1;
        $producto->save();
        return redirect()->route('productos.index')->with('status','Activo'.$producto->nombre.' Activado con éxito!');
    }

    public function destroy($id)
    {
        //
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('status','Producto '.$producto->nombre.' eliminado con éxito!');
    }


    //Funcion para Exportar a PDF


    //funcion para Exportar a Excel
    public function exportarExcel(){


    }

    

   
}
