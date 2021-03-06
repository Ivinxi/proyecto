@extends('layouts.app')
@extends('layouts.menu_categoria')

@section('content')

<div class="container principal producto py-5">
	<div class="row">
		<div class="col-12 col-md-6 offset-md-1 my-4 mag1">
			<img data-toggle="magnify" src="/{{ $producto->foto_producto }}" alt="Foto del Producto" class="img-responsive img-rounded center-block foto-prod">
		</div>
		<div class="col-12 col-md-4">
			<div class="info-prod">
				<h2 class="lora capitalize" >{{ $producto->nombre_producto}}</h2>
			</div>
			<div class="info-prod mt-lg-3">
				<h4 class="audiowide uppercase" >{{ $producto->marca }}<h4>
			</div>
			<div class="info-prod text-center my-lg-5">
				@if($producto->oferta())
			    	<span class="oferta">{{ $producto->precio() }}€</span><span> ¡{{ $producto->oferta() }} de descuento!</span><br>
			    	<h5 class="precio">{{ $producto->calcularOferta() }}€</h5>
			    @else
			    	<h5 class="precio">{{ $producto->precio }}€</h5>
			    @endif
			</div>
			<div class="info-prod text-center">
				<form action="{{ route('anadirCarrito', $producto)}}" method="POST" class="mt-md-4" id="form-carrito">
					@csrf
						
						<!-- BUSCA ENTRE TODAS LAS TALLAS DEL PRODUCTO CUÁLES TIENEN STOCK Y PONE DISABLE LAS QUE NO -->

						<select class="custom-select col-5 @error('id_talla') is-invalid @enderror" id="id_talla" name="id_talla">
                              <option selected>Talla</option>
                            @foreach($tallas as $talla)
                                {{ $vacio = false }}
                                @foreach($stocks as $stock)
                                    @if($talla->nombre_talla == $stock->nombre_talla)
                                        {{ $vacio = true}}
                                    @endif
                                @endforeach
                                @if(!$vacio)
                                    <option class="noStock" value="{{$talla->id_talla}}" disabled>{{$talla->nombre_talla}}</option>
                                @else
                                    <option value="{{$talla->id_talla}}">{{$talla->nombre_talla}}</option>
                                @endif
                            @endforeach
                        </select>

						<!-- SÓLO SACA LOS COLORES DEL PRODUCTO CON STOCK -->

                        <select class="custom-select col-5 @error('id_color') is-invalid @enderror" id="id_color" name="id_color">
                            <option selected>Color</option>
                            @foreach($stocks as $color)
                                <option value="{{$color->id_color}}">{{$color->nombre_color}}</option>
                            @endforeach
                        </select>
		
						<button type="submit" class="btn btn-anadir col-1 col-md-10 mt-md-4">
							<span class="d-none d-md-inline-block">Añadir a la cesta</span>
							<i class="fas fa-shopping-cart"></i>
						</button>

				</form>
			</div>
		</div>
		<div class="col-10 offset-1 my-4 descripcion-prod">
			<h4>Información del producto</h4>
			<span>{{ $producto->descripcion }}</span>
			<p class="capitalize"><i class="fas fa-angle-right"></i>Material: {{ $producto->material }}<br><i class="fas fa-angle-right"></i>Temporada: {{ $producto->temporada }}</p>
		</div>
	</div>

	<!-- PRODUCTOS RELACIONADOS -->
	
	@if($relacionados->isNotEmpty())
	<div class="row">
		<div class="col-10 offset-1 my-2">
			<h4><span class="font-italic font-weight-bold">Más de </span><span class="audiowide uppercase ml-2 marca-sub">{{$producto->marca}}</h4>
		</div>
		@foreach($relacionados as $relacionado)
            <div class="col-8 offset-2 col-md-5 offset-md-0 {{$loop->first ? 'offset-md-1':''}} col-lg-2">
              <div class="card mb-2 card-producto text-center">
              	<a href="{{ route('producto.view', [ 'target' => $relacionado->target, 'categoria' => $relacionado->categoria, 'producto' => $relacionado] )}}">
	                <div class="view overlay">
	                  <img class="card-img-top" src="/{{ $relacionado->foto_producto }}" alt="Card image cap">
	                </div>
	                <div class="card-body p-3">
	                  <h5 class="card-title font-weight-bold fuchsia-rose-text mb-0">{{ $producto->nombre_producto }}</h5>
	                  <span class="chili-pepper-text mb-0 {{ $relacionado->oferta()? 'oferta':'precio'}}">{{ $relacionado->precio() }}€</span>
	                  @if($relacionado->oferta())<span class="chili-pepper-text mb-0 precio">{{ $relacionado->calcularOferta() }}€</span>@endif
	                </div>             		
              	</a>
              </div>
            </div>
		@endforeach
	</div>
	@endif
</div>

@endsection