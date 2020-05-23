@extends('admin.layouts.app_admin')
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
						{{ $tallas->links() }}
					</div>

				</div>
			</div>
		</div>
	</div>
	@yield('modalcreate')

@endsection