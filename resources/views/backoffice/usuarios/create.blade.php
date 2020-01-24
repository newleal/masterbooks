@extends('backoffice.template')

@section('titulo','Usuarios')

@section('tituloseccion','Creacion Usuarios')

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
	      	<form action="{{ route('usuarios.store') }}" method="post" enctype="multipart/form-data">
	          @csrf
	          <div class="form-group">
	            <label for="nombre">Nombre</label>
	            <input type="text" name="nombre" class="form-control" placeholder="Ingresa tu nombre" required>
	          </div>

	          <div class="form-group">
	            <label for="apellido">Apellido</label>
	            <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Ingresa tu apellido" required>
	          </div>

	          <div class="form-group">
	            <label for="email">E-mail</label>
	            <input type="email"  name="email" class="form-control" placeholder="Ingresa tu email" required>
	          </div>

	          <div class="form-group">
	            <label for="password">Costrasegna</label>
	            <input type="password" name="password" class="form-control" placeholder="Ingresar una contrasegna" required>
	          </div>
	          
	          
	          <div class="form-group">
	            <label for="telefono">Numero de Telefono</label>
	            <input type="text" name="telefono" class="form-control" placeholder="Ingresa un numero de telefono" required>
	          </div>
	          
	          <div class="form-group">
	            <label for="direccion">direccion</label>
	            <input type="text" name="direccion" class="form-control" placeholder="direccion de residencia" required>
	          </div>

	          <div class="form-group">
	            <label for="ciudad_id">Ciudad</label>
	            <select name="ciudad_id" class="form-control" required>
	              <option value="">Seleccionar ciudad</option>
	              @foreach($ciudades as $ciudad)
	                <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
	              @endforeach
	            </select>
	          </div>
	          
	          <div class="form-group">
	            <label for="genero_id">genero</label>
	            <select name="genero_id" class="form-control" required>
	              <option value="">Seleccionar genero</option>
	              @foreach($generos as $genero)
	                <option value="{{$genero->id}}">{{$genero->nombre}}</option>
	              @endforeach
	            </select>
	          </div>
	          
	          <div class="form-group">
	            <label for="estado_id">Estado</label>
	            <select name="estado_id" class="form-control" required>
	              <option value="">Seleccionar estado</option>
	              @foreach($estados as $estado)
	                <option value="{{$estado->id}}">{{$estado->nombre}}</option>
	              @endforeach
	            </select>
	          </div>

	          <div class="form-group">
	            <label for="perfil_id">Perfil</label>
	            <select name="perfil_id" class="form-control" required>
	              <option value="">Seleccionar perfil</option>
	              @foreach($perfiles as $perfil)
	                <option value="{{$perfil->id}}">{{$perfil->nombre}}</option>
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