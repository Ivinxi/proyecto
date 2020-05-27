@extends('layouts.app')
@extends('layouts.menu_categoria')

@section('content')
	
	<div class="container principal py-5">
		@if(Cart::session(Auth::user()->id_usuario)->isEmpty())
			<div class="row">
				<div class="cesta col-12 text-center py-5">		
					<a href="/" class="d-inline-block">
						<h1 class="py-5 lora">TU CESTA ESTÁ VACÍA... <i class="far fa-frown"></i></h1>
						<h1 class="py-5 lora">¡AÑÁDELE ALGO! <i class="far fa-smile-wink"></i></h1>
					</a>
				</div>
			</div>


		@else
			<div class="row">
				<div class="col-10 offset-1">
					<h4 class="lora">En tu cesta:</h4>	
				</div>
			</div>
			
			@foreach($carrito as $car)
				<div class="row">
					<div class="col-3 offset-1 py-3 item-carrito">
						<a href="{{ $car->attributes->url }}">
							<img src="{{ $car->attributes->foto}}" alt="Foto Producto">
						</a>
					</div>
					<div class="col-7 py-3 item-carrito">
						<div class="float-right"><a href="{{ route('eliminarCarrito', $car->id) }}"><i class="fas fa-trash-alt fa-lg"></i></a></div>
						<a href="{{ $car->attributes->url }}" class="d-inline-block">
							<h3 class="lora capitalize">{{ $car->name }}</h3>
						</a>
						<h5 class="audiowide uppercase"><small class="capitalize reset-font">Marca: </small>{{ $car->attributes->marca }}</h5>
						<h5 class="uppercase"><small class="capitalize">Talla: </small>{{ $car->attributes->talla }}</h5>
						<h5 class="capitalize"><small>Color: </small>{{$car->attributes->color }}</h5>
						<h5 class="float-right ml-4"><small>Precio: </small>{{$car->price * $car->quantity }}€</h5>
						<h5 class="float-right"><small>Cantidad: </small>{{$car->quantity }}</h5>

					</div>
					
				</div>
			@endforeach
			
			<div class="row">
				<div class="col-10 offset-1 py-3 item-carrito text-right">
					<h5><small>Total: </small>{{ Cart::session(Auth::user()->id_usuario)->getTotal() }}€</h5>			
						<a href="" class="btn btn-compra">Procesar Compra</a>
				</div>
				
			</div>
		@endif
	</div>

@endsection