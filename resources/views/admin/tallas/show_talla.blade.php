@extends('layouts.app')
@include('admin.tallas.create_talla')
@include('admin.layouts.alertas')

@section('titulo')
	TALLAS
@endsection

@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card">
					<div class="card-header text-center">
						<a class="titulosAdmin">@yield('titulo')</a>
						<span data-toggle="modal" data-target="#modalCreate">
							<button type="button" class="btnAdd" data-toggle="tooltip" data-placement="right" title="Añadir nuevo">
								<i class="fas fa-plus"></i>
							</button>
						</span>
					</div>
					<div class="card-body">
						@yield('alertas')
				     	@if($errors->has('nombre_talla'))
		             		@foreach ($errors->get('nombre_talla') as $message)
		            			<div class="alert alert-danger alert-dismissible fade show" role="alert">
 									<strong>Error: </strong> {{ $message }}
  									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    								<span aria-hidden="true">&times;</span>
									</button>
								</div>
		            		@endforeach
		            	@endif
						<table class="table table-striped">
							<thead>
								<tr>
						   			<th scope="col" class="text-center"></th>
						   			<th scope="col" class="text-center">ID</th>
						      		<th scope="col" class="text-center">Nombre</th>
						      		<th scope="col"></th>
						    	</tr>
							</thead>
						    <tbody>
						    	@foreach ($tallas as $talla)
						  			<tr>
						  				<td class="text-center"></td>
										<td class="text-center">{{ $talla->id_talla}}</td>
						      			<td class="text-center">{{ $talla->nombre_talla}}</td>
						      			<td>
						      				<a href="{{ route('admin/tallas/edit', [$talla]) }}"><button type="button" class="btn btn-primary btn-sm btn-admin"><i class="fas fa-pencil-alt"></i></button></a>
						      				<a href="{{ route('admin/tallas/delete', [$talla]) }}" class="btn btn-danger btn-sm btn-admin"><i class="fas fa-trash-alt"></i></a>
						      			</td>
						  			</tr>
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