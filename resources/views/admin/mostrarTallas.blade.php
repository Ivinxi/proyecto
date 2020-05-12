@extends('layouts.app')

@section('titulo')
	TALLAS
@endsection

@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card">

					<div class="card-header text-center">@yield('titulo')</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
						   			<th scope="col" class="text-center"></th>
						   			<th scope="col" class="text-center">#</th>
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
						      				<a href="{{ route('editarTalla', [$talla]) }}"><button type="button" class="btn btn-primary btn-sm btn-admin">Editar</button></a>
						      				<a href="{{ route('eliminarTalla', [$talla]) }}" class="btn btn-danger btn-sm btn-admin">Borrar</a>
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

@endsection