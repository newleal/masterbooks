@extends('backoffice.template')

@section('titulo','Usuarios')

@section('tituloseccion','Usuarios')

@section('ruta')
	<li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item active">Usuarios</li>
@endsection

@section('contenido')
<div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
              	<div class="text-right">
              		<a class="btn btn-success" href="{{ route('usuarios.create') }}">Crear Usuario</a>
              	</div>
              	
                <table class="table table-striped">
                	<thead>
                		
                		<th>Nombre</th>
                		<th>Apellido</th>
                		<th>Email</th>
                		<th>Telefono</th>
                		<th>Direccion</th>
                		<th>Ciudad</th>
                		<th>Genero</th>
                		<th>Estado</th>
                		<th>Opciones</th>
                	</thead>
                	<tbody>
                		@foreach($usuarios as $usuario)
	                		<tr @if($usuario->estado_id>1) class="table-danger" @endif>
	                			<td>{{$usuario->nombre}}</td>
	                			<td>{{$usuario->apellido}}</td>
	                			<td>{{$usuario->email}}</td>
	                			<td>{{$usuario->telefono}}</td>
	                			<td>{{$usuario->direccion}}</td>
	                			<td >{{$usuario->ciudad->nombre}}</td>
	                			<td >{{$usuario->genero_id}}</td>
	                			<td>{{$usuario->estado_id}}</td>
	                			<td>{{$usuario->perfil_id}}</td>
	                			
	                			<td>
                          <a class="btn btn-warning" href="{{ route('usuarios.edit',$usuario->id) }}"><i class="fas fa-edit"></i></a>
                          @if($usuario->estado_id<2)
                            <a class="btn btn-danger" href="{{ route('usuarios.inactivar',$usuario->id) }}"><i class="fas fa-trash"></i></a>
                          @else
                            <a class="btn btn-success" href="{{ route('usuarios.activar',$usuario->id) }}"><i class="fas fa-check"></i></a>
                          @endif

                        </td>
	                		</tr>
	                	@endforeach
                	</tbody>
                </table>             	

              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection