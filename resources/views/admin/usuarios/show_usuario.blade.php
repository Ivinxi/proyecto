@extends('admin.layouts.app_admin')
@include('admin.usuarios.create_usuario')
@include('admin.layouts.alertas')

@section('titulo')
	USUARIOS
@endsection

@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
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
						      		<th scope="col" class="text-center">Email</th>
						      		<th scope="col"></th>
						    	</tr>
							</thead>
						    <tbody>
						    	@foreach ($usuarios as $usuario)
						  			<tr>
										<td class="text-center {{ $usuario->trashed() ? 'inactive':'' }}">{{ $usuario->id_usuario}}</td>
						      			<td class="text-center {{ $usuario->trashed() ? 'inactive':'' }}">{{ $usuario->nombre_usuario}}</td>
						      			<td class="text-center {{ $usuario->trashed() ? 'inactive':'' }}">{{ $usuario->email}}</td>
						      			<td class="text-center">
						      				<a href="{{ route('admin/usuarios/edit', [$usuario]) }}" class="btn btn-primary btn-sm btn-admin {{ $usuario->trashed() ? 'inactive':'' }}"><i class="fas fa-pencil-alt"></i></a>
						      				<a href="{{ route('admin/usuarios/delete', [$usuario]) }}" class="btn btn-danger btn-sm btn-admin {{ $usuario->trashed() ? 'inactive':'' }}"><i class="fas fa-trash-alt"></i></a>
						      				@if($usuario->trashed())
						  						<a href="{{ route('admin/usuarios/restore', [$usuario->id_usuario]) }}" class="btn-restore"><i class="fas fa-redo-alt"></i></a>
											@endif
						      			</td>
						  			</tr>
						 		@endforeach
						  </tbody>
						</table>
						{{ $productos->links() }}	
					</div>
				</div>
			</div>
		</div>
	</div>
	@yield('modalcreate')

@endsection