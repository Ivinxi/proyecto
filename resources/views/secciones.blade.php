@extends('layouts.app')
@extends('layouts.menu_categoria')

@section('content')

<div class="container-fluid principal py-5 secciones">
	<div class="row">

		@if($productos->isEmpty())
			<div class="col-10 offset-1 lora">
				<h1>Oops... <i class="far fa-surprise"></i> Parece que en este momento no tenemos ningún producto relacionado con su búqueda.<h1>
			</div>
		@endif

		@foreach($productos as $producto)
            <div class="col-12 col-md-4 col-lg-2">
              <div class="card mb-2 card-producto text-center">
              	@if($producto->oferta())
					<span class="etiquetaOferta">Oferta</span>
              	@endif
              	<a href="{{ route('producto.view', [ 'target' => $producto->target, 'categoria' => $producto->categoria, 'producto' => $producto] )}}">
	                <div class="view overlay">
	                  <img class="card-img-top" src="/{{ $producto->foto_producto }}" alt="Card image cap">
	                </div>
	                <div class="card-body p-3">
	                  <h5 class="card-title font-weight-bold fuchsia-rose-text mb-0">{{ $producto->nombre_producto }}</h5>
	                  <span class="chili-pepper-text mb-0 {{ $producto->oferta()? 'oferta':'precio'}}">{{ $producto->precio() }}€</span>
	                  @if($producto->oferta())<span class="chili-pepper-text mb-0 precio">{{ $producto->calcularOferta() }}€</span>@endif
	                </div>
              	
              	</a>
              </div>
            </div>

		@endforeach
	</div>
</div>

@endsection