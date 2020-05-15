@extends('layouts.app')
@include('admin.usuarios.create_usuario')
@include('admin.layouts.alertas')

@section('titulo')
	USUARIOS
@endsection

@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7">
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

						<table class="table table-striped">
							<thead>
								<tr>
						   			<th scope="col" class="text-center"></th>
						   			<th scope="col" class="text-center">ID</th>
						      		<th scope="col" class="text-center">Nombre</th>
						      		<th scope="col" class="text-center">Email</th>
						      		<th scope="col"></th>
						    	</tr>
							</thead>
						    <tbody>
						    	@foreach ($usuarios as $usuario)
						  			<tr>
						  				<td class="text-center"></td>
										<td class="text-center">{{ $usuario->id_usuario}}</td>
						      			<td class="text-center">{{ $usuario->nombre_usuario}}</td>
						      			<td class="text-center">{{ $usuario->email}}</td>
						      			<td>
						      				<a href="{{ route('admin/usuarios/edit', [$usuario]) }}" class="btn btn-primary btn-sm btn-admin"><i class="fas fa-pencil-alt"></i></a>
						      				<a href="{{ route('admin/usuarios/delete', [$usuario]) }}" class="btn btn-danger btn-sm btn-admin"><i class="fas fa-trash-alt"></i></a>
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