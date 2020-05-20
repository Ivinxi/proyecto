@extends('admin.layouts.app_admin')
@include('admin.productos.create_producto')
@include('admin.layouts.alertas')
@include('admin.stocks.create_stock')

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

						<table class="table">
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
									
						  			<tr>
										<td class="text-center table-row {{ $producto->trashed() ? 'inactive':'' }}" data-toggle="collapse" href="{{ '.stock'.$producto->id_producto }}" role="button" aria-expanded="false" aria-controls="collapseExample">{{ $producto->id_producto}}</td>
						      			<td class="text-center table-row {{ $producto->trashed() ? 'inactive':'' }}" data-toggle="collapse" href="{{ '.stock'.$producto->id_producto }}" role="button" aria-expanded="false" aria-controls="collapseExample">{{ $producto->nombre_producto}}</td>
						      			<td class="text-center table-row {{ $producto->trashed() ? 'inactive':'' }}" data-toggle="collapse" href="{{ '.stock'.$producto->id_producto }}" role="button" aria-expanded="false" aria-controls="collapseExample">{{ $producto->marca}}</td>
						      			<td class="text-center table-row {{ $producto->trashed() ? 'inactive':'' }}" data-toggle="collapse" href="{{ '.stock'.$producto->id_producto }}" role="button" aria-expanded="false" aria-controls="collapseExample">{{ $producto->precio}}</td>
						      			<td class="text-center table-row {{ $producto->trashed() ? 'inactive':'' }}" data-toggle="collapse" href="{{ '.stock'.$producto->id_producto }}" role="button" aria-expanded="false" aria-controls="collapseExample">{{ $producto->oferta()}}</td>
						      			<td class="text-center table-row {{ $producto->trashed() ? 'inactive':'' }}" data-toggle="collapse" href="{{ '.stock'.$producto->id_producto }}" role="button" aria-expanded="false" aria-controls="collapseExample">{{ $producto->foto()}}</td>
						      			<td>
						      				<a href="{{ route('admin/productos/edit', [$producto]) }}"><button type="button" class="btn btn-primary btn-sm btn-admin {{ $producto->trashed() ? 'inactive':'' }}"><i class="fas fa-pencil-alt"></i></button></a>
						      				<a href="{{ route('admin/productos/delete', [$producto]) }}" class="btn btn-danger btn-sm btn-admin {{ $producto->trashed() ? 'inactive':'' }}"><i class="fas fa-trash-alt"></i></a>
								      		@if($producto->trashed())
								  				<a href="{{ route('admin/productos/restore', [$producto->id_producto]) }}" class="btn-restore"><i class="fas fa-redo-alt"></i></a>
											@endif			
						      			</td>
									</tr>
									
									@if($producto->has('stock'))
									<tr class="collapse vacio {{ 'stock'.$producto->id_producto }}">
										<td class="text-center"></td>
						      			<td class="text-center"></td>
						      			<th class="text-center">Talla</th>
						      			<th class="text-center">Color</th>
						      			<th class="text-center">Stock</th>
						      			<td class="text-center">
						      				<button class="btnAdd createStock" data-toggle="modal" data-target="#modalStock" value="{{$producto->id_producto}}">
												<i class="fas fa-plus"></i>
											</button>
										</td>
						      			<td class="text-center"></td>
									</tr>
									@endif
									@foreach($stocks as $stock)

										@if($stock->id_producto == $producto->id_producto)
											<tr class="collapse vacio {{ 'stock'.$producto->id_producto }}">
												<td class="text-center"></td>
								      			<td class="text-center"></td>
								      			<td class="text-center">{{ $stock->nombre_talla}}</td>
								      			<td class="text-center">{{ $stock->nombre_color}}</td>
								      			<td class="text-center">{{ $stock->cantidad_stock}}</td>
								      			<td class="text-center">
						      						<a href="{{ route('admin/productos/deleteStock', [$stock]) }}"><i class="fas fa-trash-alt"></i></a>
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
	@yield('modalStock')

@endsection