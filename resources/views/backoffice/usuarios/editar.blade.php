@extends('backoffice.template')

@section('titulo','Usuarios')

@section('tituloseccion','Edicion de Usuarios')

@section('ruta')
	<li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item active">Usuarios</li>
@endsection

@section('contenido')

<div class="container-fluid">
	<div class="row">
	  <div class="col-lg-6">
	    <div class="card">
	      <div class="card-body">
	        @include('backoffice.secciones.errores')
	      	<form action="{{ route('usuarios.update', $usuario->id) }}" method="post" enctype="multipart/form-data">
	          @csrf
	          <input type="hidden" name="_method" value="PUT">
	          <div class="form-group">
	            <label for="nombre">Nombre</label>
	            <input type="text" name="nombre" class="form-control" value="{{ $usuario->nombre }}">
	          </div>

	          <div class="form-group">
	            <label for="apellido">Apellido</label>
	            <input type="text" id="apellido" name="apellido" class="form-control" value="{{ $usuario->apellido }}">
	          </div>

	          <div class="form-group">
	            <label for="email">E-mail</label>
	            <input type="email"  name="email" class="form-control" value="{{ $usuario->email }}">
	          </div>


	          <div class="form-group">
	            <label for="telefono">Numero de Telefono</label>
	            <input type="text" name="telefono" class="form-control" value="{{ $usuario->telefono }}">
	          </div>
	          
	          <div class="form-group">
	            <label for="direccion">direccion</label>
	            <input type="text" name="direccion" class="form-control" value="{{ $usuario->direccion }}" >
	          </div>

	          

	          <div class="form-group">
	            <label for="ciudad_id">Ciudad</label>
	            <select name="ciudad_id" class="form-control" >
	              <option value="">Seleccionar ciudad</option>
	              @foreach($ciudades as $ciudad)
	                <option @if($usuario->ciudad_id==$ciudad->id) selected @endif value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
	              @endforeach
	            </select>
	          </div>
	          
	          <div class="form-group">
	            <label for="genero_id">genero</label>
	            <select name="genero_id" class="form-control">
	              <option value="">Seleccionar genero</option>
	              @foreach($generos as $genero)
	                <option @if($usuario->genero_id==$genero->id) selected @endif value="{{$genero->id}}">{{$genero->nombre}}</option>
	              @endforeach
	            </select>
	          </div>
	          
	          <div class="form-group">
	            <label for="estado_id">Estado</label>
	            <select name="estado_id" class="form-control" >
	              <option value="">Seleccionar Estado</option>
	              @foreach($estados as $estado)
	                <option @if($usuario->estado_id==$estado->id) selected @endif value="{{$estado->id}}">{{$estado->nombre}}</option>
	              @endforeach
	            </select>
	          </div>

	          <div class="form-group">
	            <label for="perfil_id">Estado</label>
	            <select name="perfil_id" class="form-control" >
	              <option value="">Seleccionar perfil</option>
	              @foreach($perfiles as $perfil)
	                <option @if($usuario->perfil_id==$perfil->id) selected @endif value="{{$perfil->id}}">{{$perfil->nombre}}</option>
	              @endforeach
	            </select>
	          </div>

	          <div class="form-group">
	            <a class="btn btn-danger" href="{{ route('usuarios.index') }}">Cancelar</a>
	            <button class="btn btn-success">Guardar <i class="fas fa-save"></i></button>
	          </div>

	        </form>  	

	      </div>
	    </div>
	  </div>

	</div>
<!-- /.row -->
</div><!-- /.container-fluid -->

@endsection