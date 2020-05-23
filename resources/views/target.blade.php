@extends('layouts.app')
@extends('layouts.menu_categoria')

@section('content')

<div class="container principal py-5">
	<div class="row">
		@foreach($productos as $producto)
            <div class="col-12 col-md-4 col-lg-2">
              <div class="card mb-2">
              	<a href="{{ route('producto.view', [ $producto])}}">
	                <div class="view overlay">
	                  <img class="card-img-top" src="/{{ $producto->foto_producto }}" alt="Card image cap">
	                </div>
	                <div class="card-body p-3">
	                  <h5 class="card-title font-weight-bold fuchsia-rose-text mb-0">{{ $producto->nombre_producto }}</h5>
	                  <span class="chili-pepper-text mb-0 {{ $producto->oferta()? 'oferta':''}}">{{ $producto->precio() }}€</span>
	                  @if($producto->oferta())<span class="chili-pepper-text mb-0">{{ $producto->calcularOferta() }}€</span>@endif
	                </div>
              		
              	</a>
              </div>
            </div>

		@endforeach
	</div>
</div>

@endsection