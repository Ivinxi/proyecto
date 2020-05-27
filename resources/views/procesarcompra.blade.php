@extends('layouts.app')
@extends('layouts.menu_categoria')

@section('content')
	
	<div class="container py-5 my-5">
		<div class="row">

			<div class="col-12 col-md-8">
				<div class="card">
					<div class="card-header">
						Datos de envío
					</div>
					<div class="card-body">






						<form action="" method="POST">
							@csrf
							
							<div class="row my-4">
								<div class="form-group col-6 offset-1 d-inline-block">
								    <label for="nombre_completo">Nombre completo</label>
								    <input type="text" class="capitalize form-control @error('nombre_usuario') is-invalid @enderror" id="nombre_completo" name="nombre_completo" value="{{ Auth::user()->nombre_usuario }} {{ Auth::user()->apellidos }}">				   
								</div>

								<div class="form-group col-4 d-inline-block">
								    <label for="telefono">Teléfono</label>
								    <input type="text" class="form-control @error('nombre_usuario') is-invalid @enderror" id="telefono" name="telefono" value="{{ Auth::user()->telefono }}">		   
								</div>
							</div>

							<div class="row my-4">
								<div class="form-group col-10 offset-1">
								    <label for="dirección">Dirección de envío</label>
								    <input type="text" class="form-control @error('nombre_usuario') is-invalid @enderror" id="direccion1" name="direccion" value="{{ Auth::user()->direccion1 }}">			   
								</div>
							</div>

							<div class="row my-4">
								<div class="form-group d-inline-block col-4 offset-1">
								    <label for="provincia">Provincia</label>
								    <input type="text" class="form-control @error('nombre_usuario') is-invalid @enderror" id="provincia" name="provincia" value="{{ Auth::user()->provincia }}">		   
								</div>

								<div class="form-group d-inline-block col-4">
								    <label for="localidad">Localidad</label>
								    <input type="text" class="form-control @error('nombre_usuario') is-invalid @enderror" id="localidad" name="localidad" value="{{ Auth::user()->localidad }}">		   
								</div>

								<div class="form-group d-inline-block col-2">
								    <label for="codigo_postal">CP</label>
								    <input type="text" class="form-control @error('nombre_usuario') is-invalid @enderror" id="codigo_postal" name="codigo_postal" value="{{ Auth::user()->codigo_postal }}">			   
								</div>
							</div>
							
							<div class="row" my-4>
								<div class="col-10 offset-1">
									<a class="float-right" href="{{ route('mostrarCarrito') }}"><button type="button" class="btn btn-primary btn-sm btn-admin">Volver</button></a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-4">
				<div class="card">
					<div class="card-header">
						En tu cesta
					</div>
					<div class="card-body">
						@foreach(Cart::session(Auth::user()->id_usuario)->getContent() as $car)
							<div class="row mb-3">
								<div class="col-8 capitalize">
									<span>{{ $car->name }}</span>
								</div>

								<div class="col-4 align-self-end">
									<span>{{ $car->price * $car->quantity }}</span>
								</div>
							</div>
						@endforeach
							<div class="row">
								<div class="col-4 offset-8">
									<span class="border-top pt-2"><strong>{{ Cart::session(Auth::user()->id_usuario)->getTotal() }}</strong></span>
									

								</div>
							</div>


					</div>
				</div>
			</div>

		</div>
	</div>

@endsection