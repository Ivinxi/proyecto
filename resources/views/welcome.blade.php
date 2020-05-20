@extends('layouts.app')
@extends('layouts.menu_categoria')

@section('content')
<div class="container">
	<div class="row">

		<!-- BANNER -->
		<div class="col-md-12">
			
			<div id="banner" class="carousel slide carousel-fade" data-ride="carousel" data-interval="7000">
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="/images/carousel-1.jpg" class="d-block w-100" alt="...">
			    </div>
			    <div class="carousel-item">
			      <img src="/images/bn.png" class="d-block w-100" alt="...">
			    </div>
			    <div class="carousel-item">
			      <img src="/images/carousel-1.jpg" class="d-block w-100" alt="...">
			    </div>
			  </div>
			  <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#banner" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div id="carousel-novedades" class="carousel slide carousel-multi-item v-2 product-carousel carousel-fade" data-ride="carousel" data-interval="12000">
				<h3>NOVEDADES</h3>
	        <!--Controls-->
		        <div class="controls-top my-3 text-right d-inline-block">
		          <a class="btn-floating btn-sm" href="#carousel-novedades" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
		          <a class="btn-floating btn-sm" href="#carousel-novedades" data-slide="next"><i class="fas fa-chevron-right"></i></a>
		        </div>
		        <!--/.Controls-->

		        <div class="carousel-inner" role="listbox">
				@foreach($novedades as $novedad)
		          <div class="carousel-item {{ $loop->first ? 'active mx-auto':'' }}">
		            <div class="col-12 col-md-4 col-lg-2 mx-auto">
		              <div class="card mb-2">
		              	<a href="#">
			                <div class="view overlay">
			                  <img class="card-img-top" src="/{{ $novedad->foto_producto }}" alt="Card image cap">
			                </div>
			                <div class="card-body p-3">
			                  <h5 class="card-title font-weight-bold fuchsia-rose-text mb-0">{{ $novedad->nombre_producto }}</h5>
			                  <span class="chili-pepper-text mb-0 {{ $novedad->oferta()? 'oferta':''}}">{{ $novedad->precio() }}€</span>
			                  @if($novedad->oferta())<span class="chili-pepper-text mb-0">{{ $novedad->calcularOferta() }}€</span>@endif
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

	<div class="row seccion ofertas">
		<div class="col-md-12">
			<div id="carousel-ofertas" class="carousel slide carousel-multi-item v-2 product-carousel" data-ride="carousel">
				<h3>OFERTAS</h3>
	        <!--Controls-->
		        <div class="controls-top my-3 text-right d-inline-block">
		          <a class="btn-floating btn-sm" href="#carousel-ofertas" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
		          <a class="btn-floating btn-sm" href="#carousel-ofertas" data-slide="next"><i class="fas fa-chevron-right"></i></a>
		        </div>
		        <!--/.Controls-->

		        <div class="carousel-inner" role="listbox">
				@foreach($ofertas as $oferta)
		          <div class="carousel-item {{ $loop->first ? 'active mx-auto':'' }}">
		            <div class="col-12 col-md-4 col-lg-2 mx-auto">
		              <div class="card mb-2">
		              	<a href="#">
			                <div class="view overlay">
			                  <img class="card-img-top" src="/{{ $oferta->foto_producto }}" alt="Card image cap">
			                </div>
			                <div class="card-body p-3">
			                  <h5 class="card-title font-weight-bold fuchsia-rose-text mb-0">{{ $oferta->nombre_producto }}</h5>
			                  <span class="chili-pepper-text mb-0 {{ $oferta->oferta()? 'oferta':''}}">{{ $oferta->precio() }}€</span>
			                  @if($oferta->oferta())<span class="chili-pepper-text mb-0">{{ $oferta->calcularOferta() }}€</span>@endif
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
	
	<h3><a href="{{ route('admin/tallas') }}">-Mostrar tallas</a></h3>

	<h3><a href="{{ route('admin/colors') }}">-Mostrar colores</a></h3>

	<h3><a href="{{ route('admin/usuarios') }}">-Mostrar usuarios</a></h3>

	<h3><a href="{{ route('admin/productos') }}">-Mostrar productos</a></h3>

</div>


@endsection