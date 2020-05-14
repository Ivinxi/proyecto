@section('modalcreate')

<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Añadir usuario</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('admin/usuarios/insert') }}" method="POST">
					@csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="nombre_usuario" type="text" class="form-control @error('name') is-invalid @enderror" name="nombre_usuario" required autocomplete="nombre_usuario" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rol" class="col-md-4 col-form-label text-md-right">Rol</label>

                            <div class="col-md-6">
                                <select id="rol" class="form-control" name="rol">
                                	<option value="usuario">Usuario</option>
                                	<option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>

			    	<div class="modal-footer">
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			        	<button type="submit" class="btn btn-primary">Guardar</button>
			      	</div>
				</form>
      		</div>
    	</div>
  	</div>
</div>

@endsection