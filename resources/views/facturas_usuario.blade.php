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

			<div class="col-12 col-md-8 offset-md-1 mt-5">
                <div class="row mb-5">
                	<div class="col-12 text-center">
                		<h3 class="lora">Tus Pedidos</h3>
                	</div>
                </div>
				<table class="table">
					<tr>
						<th>Factura</th>
						<th>Total</th>
						<th>Estado</th>
						<th>PDF</th>	
					</tr>
					
					@foreach($facturas as $factura)
						<tr>
							<th>{{ $factura->id_factura }}</th>
							<th>{{ $factura->precio_factura }}€</th>
							<th class="capitalize">{{ $factura->estado }}</th>
							<th><a href="{{ route('downloadPDF', $factura->pdf_factura) }}"><i class="fas fa-file-download fa-lg"></i></a></th>
						</tr>
					@endforeach

				</table>

			</div>
		</div>
	</div>
@endsection