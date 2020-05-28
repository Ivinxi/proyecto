@extends('layouts.app')
@extends('layouts.menu_categoria')

@section('content')
	
	<div class="container py-5 my-5">
		<div class="row">
			<div class="col-12 col-md-8">

				<form action="{{ route('pago') }}" method="POST">
				@csrf

					<div class="card">
						<div class="card-header">
							Datos de envío
						</div>
						<div class="card-body">
								
							<div class="row my-4">
								<div class="form-group col-6 offset-1 d-inline-block">
								    <label for="nombre_completo">Nombre completo</label>
								    <input type="text" class="capitalize form-control @error('nombre_completo') is-invalid @enderror" id="nombre_completo" name="nombre_completo" value="{{ Auth::user()->nombre_usuario }} {{ Auth::user()->apellidos }}">				   
								</div>

								<div class="form-group col-4 d-inline-block">
								    <label for="telefono">Teléfono</label>
								    <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ Auth::user()->telefono }}">		   
								</div>
							</div>

							<div class="row my-4">
								<div class="form-group col-10 offset-1">
								    <label for="direccion">Dirección de envío</label>
								    <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{ Auth::user()->direccion1 }}">			   
								</div>
							</div>

							<div class="row my-4">
								<div class="form-group d-inline-block col-4 offset-1">
								    <label for="provincia">Provincia</label>
								    <input type="text" class="form-control @error('provincia') is-invalid @enderror" id="provincia" name="provincia" value="{{ Auth::user()->provincia }}">		   
								</div>

								<div class="form-group d-inline-block col-4">
								    <label for="localidad">Localidad</label>
								    <input type="text" class="form-control @error('localidad') is-invalid @enderror" id="localidad" name="localidad" value="{{ Auth::user()->localidad }}">		   
								</div>

								<div class="form-group d-inline-block col-2">
								    <label for="codigo_postal">CP</label>
								    <input type="text" class="form-control @error('codigo_postal') is-invalid @enderror" id="codigo_postal" name="codigo_postal" value="{{ Auth::user()->codigo_postal }}" maxlength="5">			   
								</div>
							</div>
							
						</div>
					
						<div class="card-header">
							Datos pago													
						</div>
						<div class="card-body">
							<div class="row my-4">
								<div class="custom-control custom-radio custom-control-inline d-inline-block col-3 ml-auto">
								    <input type="radio" class="custom-control-input @error('metodo_pago') is-invalid @enderror" id="tarjeta" name="metodo_pago" value="tarjeta" required>		   
								    <label class="custom-control-label" for="tarjeta">Tarjeta</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline d-inline-block col-3 mr-auto">
								    <input type="radio" class="custom-control-input @error('metodo_pago') is-invalid @enderror" id="contrareembolso" name="metodo_pago" value="contrareembolso" required>		   
								    <label class="custom-control-label" for="contrareembolso">Contrareembolso</label>
								</div>
							</div>

							<div class="row tarjeta">
								<div class="form-group col-6 offset-3">
								    <label for="titular">Titular</label>
								    <input type="text" class=" form-control @error('titular') is-invalid @enderror" id="titular" name="titular"  placeholder="Nombre del Titular">				   
								</div>

								<div class="form-group col-6 offset-3">
								    <label for="num_tarjeta">Número</label>
								    <input type="text" class="form-control @error('num_tarjeta') is-invalid @enderror" id="num_tarjeta" name="num_tarjeta" placeholder="Número de la Tarjeta" maxlength="16">				   
								</div>

								<div class="form-group col-4 offset-3">
								    <label for="fecha_tarjeta">Fecha de caducidad</label>
								    <input type="text" class="form-control @error('fecha_tarjeta') is-invalid @enderror" id="fecha_tarjeta" name="fecha_tarjeta" placeholder="mm/aa" maxlength="5">				   
								</div>

								<div class="form-group col-2">
								    <label for="cvc">CVC</label>
								    <input type="text" class="form-control @error('cvc') is-invalid @enderror" id="cvc" name="cvc" placeholder="000" maxlength="3">				   
								</div>

							</div>
						</div>
						<div class="row my-4">
							<div class="col-10 offset-1">
								<button type="submit" class="btn float-right btn-compra">Finalizar Compra <i class="fas fa-shipping-fast"></i></button>
								<a class="float-left" href="{{ route('mostrarCarrito') }}"><button type="button" class="btn btn-compra">Volver</button></a>
							</div>
						</div>
					</div>

				</form>
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