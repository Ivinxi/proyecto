@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row justify-content-center">

		<div class="col-md-8">

			<form action="{{ route('admin/usuarios/update', [$usuario]) }}" method="POST">
				@csrf

				<div class="form-group">
				    <label for="name">Usuario</label>
				    <input type="text" class="form-control" id="name" name="nombre_usuario" value="{{ $usuario->nombre_usuario }}">
				    @if($errors->has('nombre_usuario'))
		            	@foreach ($errors->get('nombre_usuario') as $message)
		                	<span class="help-block text-error">{{ $message }}</span>
		              	@endforeach
		            @endif				   
				</div>	
				<div class="form-group">
				    <label for="name">Email</label>
				    <input type="email" class="form-control" id="name" name="email" value="{{ $usuario->email }}">
				    @if($errors->has('email'))
		            	@foreach ($errors->get('email') as $message)
		                	<span class="help-block text-error">{{ $message }}</span>
		              	@endforeach
		            @endif				   
				</div>

				<button type="submit" class="btn btn-primary btn-sm btn-admin">Guardar</button>
				<a href="{{ route('admin/usuarios') }}"><button type="button" class="btn btn-primary btn-sm btn-admin">Volver</button></a>

			</form>

		</div>

	</div>

</div>

@endsection