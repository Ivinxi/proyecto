@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row justify-content-center">

		<div class="col-md-8">

			<form action="{{ route('admin/usuarios/update', [$usuario]) }}" method="POST">
				@csrf

				<div class="form-group">
				    <label for="nombre_usuario">Usuario</label>
				    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="{{ $usuario->nombre_usuario }}">
				    @if($errors->has('nombre_usuario'))
		            	@foreach ($errors->get('nombre_usuario') as $message)
		                	<span class="help-block text-error">{{ $message }}</span>
		              	@endforeach
		            @endif				   
				</div>

				<div class="form-group">
				    <label for="email">Email</label>
				    <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}">
				    @if($errors->has('email'))
		            	@foreach ($errors->get('email') as $message)
		                	<span class="help-block text-error">{{ $message }}</span>
		              	@endforeach
		            @endif				   
				</div>

				<!-- DATOS OPCIONALES -->

                <div class="form-group">
                    <label for="form-group">Rol</label>
                    <select id="rol" class="form-control" name="rol">	
                    	<option value="usuario">Usuario</option>                    
	                    @if( $usuario->rol == 'admin')
	                        <option value="admin" selected>Admin</option>
	                    @else
							<option value="admin">Admin</option>
	                    @endif
                    </select>
                </div>

				<!-- <div class="form-group">
				    <label for="name">Apellidos</label>
				    <input type="apellidos" class="form-control" id="apellidos" name="apellidos" value="{{ $usuario->apellidos }}">
				    @if($errors->has('apellidos'))
		            	@foreach ($errors->get('apellidos') as $message)
		                	<span class="help-block text-error">{{ $message }}</span>
		              	@endforeach
		            @endif				   
				</div>

				<div class="form-group">
				    <label for="name">Teléfono</label>
				    <input type="telefono" class="form-control" id="telefono" name="telefono" value="{{ $usuario->telefono }}">
				    @if($errors->has('telefono'))
		            	@foreach ($errors->get('telefono') as $message)
		                	<span class="help-block text-error">{{ $message }}</span>
		              	@endforeach
		            @endif				   
				</div>

				<div class="form-group">
				    <label for="name">Dirección 1</label>
				    <input type="direccion1" class="form-control" id="direccion1" name="direccion1" value="{{ $usuario->direccion1 }}">
				    @if($errors->has('direccion1'))
		            	@foreach ($errors->get('direccion1') as $message)
		                	<span class="help-block text-error">{{ $message }}</span>
		              	@endforeach
		            @endif				   
				</div>

				<div class="form-group">
				    <label for="name">Dirección 2</label>
				    <input type="direccion2" class="form-control" id="direccion2" name="direccion2" value="{{ $usuario->direccion2 }}">
				    @if($errors->has('direccion2'))
		            	@foreach ($errors->get('direccion2') as $message)
		                	<span class="help-block text-error">{{ $message }}</span>
		              	@endforeach
		            @endif				   
				</div>

				<div class="form-group">
				    <label for="name">Provincia</label>
				    <input type="Provincia" class="form-control" id="provincia" name="provincia" value="{{ $usuario->provincia }}">
				    @if($errors->has('provincia'))
		            	@foreach ($errors->get('provincia') as $message)
		                	<span class="help-block text-error">{{ $message }}</span>
		              	@endforeach
		            @endif				   
				</div>

				<div class="form-group">
				    <label for="name">Localidad</label>
				    <input type="localidad" class="form-control" id="localidad" name="localidad" value="{{ $usuario->localidad }}">
				    @if($errors->has('localidad'))
		            	@foreach ($errors->get('localidad') as $message)
		                	<span class="help-block text-error">{{ $message }}</span>
		              	@endforeach
		            @endif				   
				</div>

				<div class="form-group">
				    <label for="name">Código Postal</label>
				    <input type="codigo_postal" class="form-control" id="codigo_postal" name="codigo_postal" value="{{ $usuario->codigo_postal }}">
				    @if($errors->has('codigo_postal'))
		            	@foreach ($errors->get('codigo_postal') as $message)
		                	<span class="help-block text-error">{{ $message }}</span>
		              	@endforeach
		            @endif				   
				</div> -->


				<button type="submit" class="btn btn-primary btn-sm btn-admin">Guardar</button>
				<a href="{{ route('admin/usuarios') }}"><button type="button" class="btn btn-primary btn-sm btn-admin">Volver</button></a>

			</form>

		</div>

	</div>

</div>

@endsection