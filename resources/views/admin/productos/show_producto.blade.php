@extends('layouts.app')
@include('admin.productos.create_producto')
@include('admin.layouts.alertas')

@section('titulo')
	PRODUCTOS	
@endsection

@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header text-center">
						<span class="titulosAdmin">@yield('titulo')</span>
						<span  data-toggle="tooltip" data-placement="right" title="Añadir nuevo">
							<button type="button" class="btnAdd" data-toggle="modal" data-target="#modalCreate">
								<i class="fas fa-plus"></i>
							</button>
						</span>
					</div>
					<div class="card-body">
						
						@yield('alertas')

						<table class="table table-striped">
							<thead>
								<tr>
						   			<th scope="col" class="text-center">ID</th>
						   			<th scope="col" class="text-center">Nombre</th>
						      		<th scope="col" class="text-center">Marca</th>
						      		<th scope="col" class="text-center">Precio</th>
						      		<th scope="col" class="text-center">Oferta</th>
						      		<th scope="col" class="text-center">Foto</th>
						      		<th scope="col"></th>
						    	</tr>
							</thead>
						    <tbody>

						    	@foreach ($productos as $producto)

						  			<tr class="table-row" data-toggle="collapse" href="{{ '.stock'.$producto->id_producto }}" role="button" aria-expanded="false" aria-controls="collapseExample">
										<td class="text-center">{{ $producto->id_producto}}</td>
						      			<td class="text-center">{{ $producto->nombre_producto}}</td>
						      			<td class="text-center">{{ $producto->marca}}</td>
						      			<td class="text-center">{{ $producto->precio}}</td>
						      			<td class="text-center">{{ $producto->oferta()}}</td>
						      			<td class="text-center">{{ $producto->foto()}}</td>
						      			<td>
						      				<a href="{{ route('admin/productos/edit', [$producto]) }}"><button type="button" class="btn btn-primary btn-sm btn-admin"><i class="fas fa-pencil-alt"></i></button></a>
						      				<a href="{{ route('admin/productos/delete', [$producto]) }}" class="btn btn-danger btn-sm btn-admin"><i class="fas fa-trash-alt"></i></a>
						      			</td>
									</tr>
									
									<tr class="collapse vacio {{ 'stock'.$producto->id_producto }}">
										<td class="text-center"></td>
						      			<td class="text-center"></td>
						      			<th class="text-center">Talla</th>
						      			<th class="text-center">Color</th>
						      			<th class="text-center">Stock</th>
						      			<td class="text-center"></td>
						      			<td class="text-center"></td>
									</tr>

									@foreach($stocks as $stock)

										@if($stock->id_producto == $producto->id_producto)
											<tr class="collapse vacio {{ 'stock'.$producto->id_producto }}">
												<td class="text-center"></td>
								      			<td class="text-center"></td>
								      			<td class="text-center">{{ $stock->nombre_talla}}</td>
								      			<td class="text-center">{{ $stock->nombre_color}}</td>
								      			<td class="text-center">{{ $stock->cantidad_stock}}</td>
								      			<td>
								      				<a href="{{ route('admin/productos/delete', [$producto]) }}"><i class="fas fa-pencil-alt"></i></a>
								      				<a href="{{ route('admin/productos/delete', [$producto]) }}"><i class="fas fa-trash-alt"></i></a>
								      			</td>
								      			<td class="text-center"></td>
											</tr>
										@endif

									@endforeach
													
						 		@endforeach

						  </tbody>
						</table>	
					</div>
				</div>
			</div>
		</div>
	</div>
	@yield('modalcreate')

@endsection