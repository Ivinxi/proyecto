@extends('layouts.app')
@extends('layouts.menu_categoria')

@section('content')

<div class="container">
	<div class="row producto">
		<div class="col-md-3 offset-md-2 mag1">
			<img data-toggle="magnify" src="/{{ $producto->foto_producto }}" alt="Foto del Producto" class="img-responsive img-rounded center-block foto-prod">
		</div>
		<div class="col-md-3 offset-md-1">
			<div class="info-prod">
				<h2>{{ $producto->nombre_producto}}</h2>
			</div>
			<div class="info-prod">
				<h4>{{ $producto->marca }}<h4>
			</div>
			<div class="info-prod">
				@if($producto->oferta())
			    	<span class="oferta">{{ $producto->precio() }}€</span><span> ¡{{ $producto->oferta() }} de descuento!</span><br>
			    	<h5 class="precio">{{ $producto->calcularOferta() }}€</h5>
			    @else
			    	<h5 class="precio">{{ $producto->precio }}€</h5>
			    @endif
			</div>
		</div>
		<div class="col-md-10 offset-md-1">
			<span>{{ $producto->descripcion }}</span>
			<p>-Material: {{ $producto->material }}<br>-Temporada: {{ $producto->temporada }}</p>
		</div>
	</div>
</div>

@endsection