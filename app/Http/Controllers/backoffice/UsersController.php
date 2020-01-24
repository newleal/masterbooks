<?php

namespace App\Http\Controllers\backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Ciudad;
use App\Genero;
use App\Estadousuario;
use App\Perfil;

class UsersController extends Controller
{
    
    public function index()
    {
        $usuarios = User::all();
        return view('backoffice.usuarios.index',compact('usuarios'));

    }

   
    public function create()
    {   
        $ciudades = Ciudad::all();
        $generos = Genero::all();
        $estados = Estadousuario::all();
        $perfiles = Perfil::all();
        return view('backoffice.usuarios.create', compact('ciudades','generos','estados','perfiles'));
    }

    
    public function store(Request $request)
    {   
        /*
        $request->validate([
            'nombre'=> 'required',
            'apellido'=> 'required',
            'email'=> 'required',
            //'password'=> 'required',
            'telefono'=> 'required|max:100',
            'direccion'=> 'required',
            'ciudad_id'=> 'required',
            'genero_id'=> 'required',
            'estado_id'=> 'required',
            'perfil_id'=> 'required'

        ]); 
        */
        /*
        $usuario = User::create([
            'nombre'=> $request->nombre,
            'apellido'=> $request->apellido,
            'email'=> $request->email,
            'password'=> $request->password,
            'telefono'=> $request->telefono,
            'direccion'=> $request->direccion,
            'ciudad_id'=> $request->ciudad_id,
            'genero_id'=> $request->genero_id,
            'estado_id'=> $request->estado_id,
            'peril_id'=> $request->peril_id

        ]);
        */
        $usuario = new User();
        $usuario->nombre= $request->nombre;
        $usuario->apellido= $request->apellido;
        $usuario->email= $request->email;
        $usuario->password= $request->password;
        $usuario->telefono= $request->telefono;
        $usuario->direccion= $request->direccion;
        $usuario->ciudad_id= $request->ciudad_id;
        $usuario->genero_id= $request->genero_id;
        $usuario->estado_id= $request->estado_id;
        $usuario->perfil_id= $request->perfil_id;   
        $usuario->save(); 

        return redirect()->route('usuarios.index');
    }

    
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {   
        $usuario = User::find($id);
        $ciudades = Ciudad::all();
        $generos = Genero::all();
        $estados = Estadousuario::all();
        $perfiles = Perfil::all();
        return view('backoffice.usuarios.editar', compact('usuario','ciudades','generos','estados','perfiles'));
    }

    /**
     * Elimina el registro (como uso softdelete, solo le pone fecha de eliminacion)
     */    
    public function update(Request $request, $id)
    {
         /*
         $request->validate([
            'nombre'=> 'required',
            'apellido'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'telefono'=> 'required|max:100',
            'direccion'=> 'required',
            'ciudad_id'=> 'required',
            'genero_id'=> 'required',
            'estado_id'=> 'required',
            'perfil_id'=> 'required'

        ]); 
        */
        $usuario = User::find($id);
        $usuario->nombre= $request->nombre;
        $usuario->apellido= $request->apellido;
        $usuario->email= $request->email;
        $usuario->password= $request->password;
        $usuario->telefono= $request->telefono;
        $usuario->direccion= $request->direccion;
        $usuario->ciudad_id= $request->ciudad_id;
        $usuario->genero_id= $request->genero_id;
        $usuario->estado_id= $request->estado_id;
        $usuario->perfil_id= $request->perfil_id;   
        $usuario->save(); 

        return redirect()->route('usuarios.index');
        //el trabajo lo llevo al 75%
    }

   
    public function destroy($id)
    {
        //
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('status','Usuario '.$usuario->nombre.' eliminado con éxito!');
    }
}
