@extends('layouts.app')
@extends('layouts.menu_categoria')

@section('content')
<div class="container principal pb-4">
	<div class="row">
		
		@if(session('compra_exito'))
			<div class="alert alert-success alert-dismissible fixed-top w-50 mx-auto mt-3" role="alert">
              <strong>Tu compra se ha realizado con éxito.</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
		@endif

		@if(session('status'))
			<div class="alert alert-success alert-dismissible fixed-top w-50 mx-auto mt-3" role="alert">
              <strong>{{ session('status') }}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
		@endif

				<!-- BANNER -->

		<div class="col-md-12 px-0">
			
			<div id="banner" class="carousel slide carousel-fade" data-ride="carousel" data-interval="10000">
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="/images/carousel-1.jpg" class="d-block w-100" alt="...">
			    </div>
			    <div class="carousel-item">
			      <img src="/images/carousel-2.jpg" class="d-block w-100" alt="...">
			    </div>
			    <div class="carousel-item">
			      <img src="/images/carousel-3.jpg" class="d-block w-100" alt="...">
			    </div>
			  </div>
			  <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Anterior</span>
			  </a>
			  <a class="carousel-control-next" href="#banner" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Siguiente</span>
			  </a>
			</div>
		</div>
	</div>

	<!-- PRODUCTOS DESTACADOS -->

	@if($p1 != null || $p2 != null)
	<div class="row">
		<div class="col-12 col-md-5 col-lg-4 offset-md-1 mt-3">		
			<div class="p-3 text-center destacados">
				<a href="{{ route('categoria', [ 'target' => $p1->target, 'categoria' => $p1->categoria] )}}">
					<h3>{{$p1->categoria()}}</h3>
					<div class="img-dest">
						<img src="{{$p1->foto_producto}}" alt="Foto categoría">
					</div>
				</a>
			</div>
		</div>
		<div class="col-12 col-md-5 col-lg-4 offset-lg-2 mt-3">
			<div class="p-3 text-center destacados">
				<a href="{{ route('categoria', [ 'target' => $p2->target, 'categoria' => $p2->categoria] )}}">
					<h3 class="dest-der">{{$p2->categoria()}}</h3>
					<div class="img-dest">
						<img src="{{$p2->foto_producto}}" alt="Foto categoría">
					</div>
				</a>		
			</div>
		</div>
	</div>
	@endif

	<!-- CARRUSEL NOVEDADES -->

	@if(count($novedades) > 5)
	<div class="row">
		<div class="col-md-12">
			<div id="carousel-novedades" class="carousel slide carousel-multi-item v-2 product-carousel mt-4 text-center" data-ride="carousel" data-interval="12000">
				<div class="borde-bot">
					<h3 class="d-inline-block titulo-principal">NOVEDADES</h3>
		       		<!--Controls-->
			        <div class="controls-top mr-3">
			        	<a class="btn-floating btn-sm flecha-carrusel" href="#carousel-novedades" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
			        	<a class="btn-floating btn-sm flecha-carrusel" href="#carousel-novedades" data-slide="next"><i class="fas fa-chevron-right"></i></a>
			        </div>
		    	</div>
		        <!--/.Controls-->
		        <div class="carousel-inner py-3" role="listbox">
				@foreach($novedades as $novedad)
		          <div class="carousel-item {{ $loop->first ? 'active mx-auto':'' }}">
		            <div class="col-12 col-md-4 col-lg-2 mx-auto">
		              <div class="card mb-2 card-producto">
		              	<a href="{{ route('producto.view', [ 'target' => $novedad->target, 'categoria' => $novedad->categoria, 'producto' => $novedad] )}}">
			                <div class="view overlay">
			                  <img class="card-img-top" src="/{{ $novedad->foto_producto }}" alt="Card image cap">
			                </div>
			                <div class="card-body p-3">
			                  <h5 class="card-title lora font-weight-bold fuchsia-rose-text mb-0">{{ $novedad->nombre_producto }}</h5>
			                  <span class="chili-pepper-text mb-0 {{ $novedad->oferta()? 'oferta':'precio'}}">{{ $novedad->precio() }}€</span>
			                  @if($novedad->oferta())<span class="chili-pepper-text mb-0 precio">{{ $novedad->calcularOferta() }}€</span>@endif
			                </div>
		              		
		              	</a>
		              </div>
		            </div>
		          </div>
		          @endforeach
	        	</div>
	      	</div>
		</div>
	</div>
	@endif

	<!-- CARRUSEL OFERTAS -->

	@if(count($ofertas) > 5)
	<div class="row seccion ofertas">
		<div class="col-md-12">
			<div id="carousel-ofertas" class="carousel slide carousel-multi-item v-2 product-carousel mt-4 text-center" data-ride="carousel" data-interval="14000">
				<div class="borde-bot">
				<h3 class="d-inline-block titulo-principal">OFERTAS</h3>
	       		<!--Controls-->
			        <div class="controls-top mr-3">
			        	<a class="btn-floating btn-sm flecha-carrusel" href="#carousel-ofertas" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
			        	<a class="btn-floating btn-sm flecha-carrusel" href="#carousel-ofertas" data-slide="next"><i class="fas fa-chevron-right"></i></a>
			        </div>
		    	</div>
		        <!--/.Controls-->
		        <div class="carousel-inner py-3" role="listbox">
				@foreach($ofertas as $oferta)
		          <div class="carousel-item {{ $loop->first ? 'active mx-auto':'' }}">
		            <div class="col-12 col-md-4 col-lg-2 mx-auto">
		              <div class="card mb-2 card-producto">
		              	<a href="{{ route('producto.view', [ 'target' => $oferta->target, 'categoria' => $oferta->categoria, 'producto' => $oferta] )}}">
			                <div class="view overlay">
			                  <img class="card-img-top" src="/{{ $oferta->foto_producto }}" alt="Card image cap">
			                </div>
			                <div class="card-body p-3">
			                  <h5 class="card-title font-weight-bold fuchsia-rose-text mb-0">{{ $oferta->nombre_producto }}</h5>
			                  <span class="chili-pepper-text mb-0 {{ $oferta->oferta()? 'oferta':'precio'}}">{{ $oferta->precio() }}€</span>
			                  @if($oferta->oferta())<span class="chili-pepper-text mb-0 precio">{{ $oferta->calcularOferta() }}€</span>@endif
			                </div>
		              		
		              	</a>
		              </div>
		            </div>
		          </div>
		          @endforeach
	        	</div>
	      	</div>
		</div>
	</div>
	@endif

	<!-- CARRUSEL ÚLTIMAS UNIDADES -->

	@if(count($ultimas) > 5)
	<div class="row seccion ultimas">
		<div class="col-md-12">
			<div id="carousel-ultimas" class="carousel slide carousel-multi-item v-2 product-carousel mt-4 text-center" data-ride="carousel" data-interval="16000">
				<div class="borde-bot">
				<h3 class="d-inline-block titulo-principal">ÚLTIMAS UNIDADES</h3>
	        	<!--Controls-->
			        <div class="controls-top mr-3">
			        	<a class="btn-floating btn-sm flecha-carrusel" href="#carousel-ultimas" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
			        	<a class="btn-floating btn-sm flecha-carrusel" href="#carousel-ultimas" data-slide="next"><i class="fas fa-chevron-right"></i></a>
			        </div>
		    	</div>
		        <!--/.Controls-->
		        <div class="carousel-inner py-3" role="listbox">
				@foreach($ultimas as $ultima)
		          <div class="carousel-item {{ $loop->first ? 'active mx-auto':'' }}">
		            <div class="col-12 col-md-4 col-lg-2 mx-auto">
		              <div class="card mb-2 card-producto">
		              	<a href="{{ route('producto.view', [ 'target' => $ultima->target, 'categoria' => $ultima->categoria, 'producto' => $ultima] )}}">
			                <div class="view overlay">
			                  <img class="card-img-top" src="/{{ $ultima->foto_producto }}" alt="Card image cap">
			                </div>
			                <div class="card-body p-3">
			                  <h5 class="card-title font-weight-bold fuchsia-rose-text mb-0">{{ $ultima->nombre_producto }}</h5>
			                  <span class="chili-pepper-text mb-0 {{ $ultima->oferta()? 'oferta':'precio'}}">{{ $ultima->precio() }}€</span>
			                  @if($ultima->oferta())<span class="chili-pepper-text mb-0 precio">{{ $ultima->calcularOferta() }}€</span>@endif
			                </div>
		              		
		              	</a>
		              </div>
		            </div>
		          </div>
		          @endforeach
	        	</div>
	      	</div>
		</div>
	</div>
	@endif
</div>


@endsection