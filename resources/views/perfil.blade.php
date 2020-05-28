@extends('layouts.app')

@section('content')
	
	<div class="container principal py-5">
		
		<div class="row justify-content-center">

			<div class="col-12 col-md-2 mt-5">

				<ul class="list-group list-group-flush text-center">
					<li class="list-group-item">
						<a href="{{ route('perfil')}}" class="">Mi perfil</a>					
					</li>					
					<li class="list-group-item">
						<a href="{{ route('actualizar')}}" class="">Editar mis datos</a>					
					</li>
					<li class="list-group-item">
						<a href="{{ route('facturas')}}" class="">Ver mis facturas</a>						
					</li>
					<li class="list-group-item">
						<form action="{{route('password.email')}}" id="password" method="POST">
							@csrf
							<input type="hidden" name="email" value="{{Auth::user()->email}}">
							<button type="submit" for="password" class="">Modificar contraseña</button>
						</form>							

					</li>
				</ul>		
			</div>

			<div class="col-12 col-md-8 offset-md-1">
			
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
                    </div>                   
                @endif

                <div class="row mb-5">
                	<div class="col-12 text-center">
                		<h3 class="lora">Tus datos</h3>
                	</div>
                </div>

				@if(request()->is('perfil/actualizar'))
					<form action="{{ route('perfil/update') }}" method="POST">
						@csrf
				@endif
				
				<div class="row">
					<div class="col-md-6">
					    <label for="nombre_usuario">Nombre</label>
					    <input type="text" class="form-control @error('nombre_usuario') is-invalid @enderror" id="nombre_usuario" name="nombre_usuario" value="{{ Auth::user()->nombre_usuario }}" {{request()->is('perfil/actualizar') ? '':'disabled'}}>
					    @if($errors->has('nombre_usuario'))
			            	@foreach ($errors->get('nombre_usuario') as $message)
			                	<span class="help-block text-error">{{ $message }}</span>
			              	@endforeach
			            @endif				   
					</div>

					<div class="col-md-6">
					    <label for="apellidos">Apellidos</label>
					    <input type="apellidos" class="form-control @error('nombre_usuario') is-invalid @enderror" id="apellidos" name="apellidos" value="{{ Auth::user()->apellidos }}" {{request()->is('perfil/actualizar') ? '':'disabled'}}>
					    @if($errors->has('apellidos'))
			            	@foreach ($errors->get('apellidos') as $message)
			                	<span class="help-block text-error">{{ $message }}</span>
			              	@endforeach
			            @endif				   
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-6">
					    <label for="email">Email</label>
					    <input type="email" class="form-control @error('nombre_usuario') is-invalid @enderror" id="email" name="email" value="{{ Auth::user()->email }}" {{request()->is('perfil/actualizar') ? '':'disabled'}}>
					    @if($errors->has('email'))
			            	@foreach ($errors->get('email') as $message)
			                	<span class="help-block text-error">{{ $message }}</span>
			              	@endforeach
			            @endif				   
					</div>



					<div class="form-group col-6">
					    <label for="telefono">Teléfono</label>
					    <input type="telefono" class="form-control @error('nombre_usuario') is-invalid @enderror" id="telefono" name="telefono" value="{{ Auth::user()->telefono }}" {{request()->is('perfil/actualizar') ? '':'disabled'}}>
					    @if($errors->has('telefono'))
			            	@foreach ($errors->get('telefono') as $message)
			                	<span class="help-block text-error">{{ $message }}</span>
			              	@endforeach
			            @endif				   
					</div>
				</div>

				<div class="row">
					<div class="form-group col-12">
					    <label for="direccion1">Dirección 1</label>
					    <input type="direccion1" class="form-control @error('nombre_usuario') is-invalid @enderror" id="direccion1" name="direccion1" value="{{ Auth::user()->direccion1 }}" {{request()->is('perfil/actualizar') ? '':'disabled'}}>
					    @if($errors->has('direccion1'))
			            	@foreach ($errors->get('direccion1') as $message)
			                	<span class="help-block text-error">{{ $message }}</span>
			              	@endforeach
			            @endif				   
					</div>

					<div class="form-group col-4">
					    <label for="provincia">Provincia</label>
					    <input type="Provincia" class="form-control @error('nombre_usuario') is-invalid @enderror" id="provincia" name="provincia" value="{{ Auth::user()->provincia }}" {{request()->is('perfil/actualizar') ? '':'disabled'}}>
					    @if($errors->has('provincia'))
			            	@foreach ($errors->get('provincia') as $message)
			                	<span class="help-block text-error">{{ $message }}</span>
			              	@endforeach
			            @endif				   
					</div>

					<div class="form-group col-4">
					    <label for="localidad">Localidad</label>
					    <input type="localidad" class="form-control @error('nombre_usuario') is-invalid @enderror" id="localidad" name="localidad" value="{{ Auth::user()->localidad }}" {{request()->is('perfil/actualizar') ? '':'disabled'}}>
					    @if($errors->has('localidad'))
			            	@foreach ($errors->get('localidad') as $message)
			                	<span class="help-block text-error">{{ $message }}</span>
			              	@endforeach
			            @endif				   
					</div>

					<div class="form-group col-2">
					    <label for="codigo_postal">CP</label>
					    <input type="codigo_postal" class="form-control @error('nombre_usuario') is-invalid @enderror" id="codigo_postal" name="codigo_postal" value="{{ Auth::user()->codigo_postal }}" {{request()->is('perfil/actualizar') ? '':'disabled'}}>
					    @if($errors->has('codigo_postal'))
			            	@foreach ($errors->get('codigo_postal') as $message)
			                	<span class="help-block text-error">{{ $message }}</span>
			              	@endforeach
			            @endif				   
					</div>
				</div>

				@if(Route::is('actualizar'))
					<button type="submit" class="btn btn-sm btn-anadir">Guardar</button>
				@endif

			</div>		

		</div>

	</div>
@endsection