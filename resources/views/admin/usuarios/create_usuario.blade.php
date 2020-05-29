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
                            <label for="nombre_usuario" class="col-md-4 col-form-label text-md-right ">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="nombre_usuario" type="text" class="form-control @error('nombre_usuario') is-invalid @enderror" name="nombre_usuario" value="{{ old('nombre_usuario') }}" required>

                                @error('nombre_usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"required>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" minlength="8">

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
                                	@if( old('rol') == 'admin')
                                        <option value="vendedor">Vendedor</option>
                                		<option value="admin" selected>Admin</option>
                                	@elseif( old('rol') == 'vendedor')
                                        <option value="vendedor" selected>Vendedor</option>
										<option value="admin">Admin</option>
                                	@else
                                        <option value="vendedor">Vendedor</option>
                                        <option value="admin">Admin</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <!-- DATOS OPCIONALES -->
						
						<p class="datos-opc">Datos opcionales</p>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Apellidos</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}">

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" size="9">

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Dirección 1</label>

                            <div class="col-md-6">
                                <input id="direccion1" type="text" class="form-control @error('direccion1') is-invalid @enderror" name="direccion1" value="{{ old('direccion1') }}">

                                @error('direccion1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Dirección 2</label>

                            <div class="col-md-6">
                                <input id="direccion2" type="text" class="form-control @error('direccion2') is-invalid @enderror" name="direccion2" value="{{ old('direccion2') }}">

                                @error('direccion2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Provincia</label>

                            <div class="col-md-6">
                                <input id="provincia" type="text" class="form-control @error('provincia') is-invalid @enderror" name="provincia" value="{{ old('provincia') }}">

                                @error('provincia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Localidad</label>

                            <div class="col-md-6">
                                <input id="localidad" type="text" class="form-control @error('localidad') is-invalid @enderror" name="localidad" value="{{ old('localidad') }}">

                                @error('localidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Código Postal</label>

                            <div class="col-md-6">
                                <input id="codigo_postal" type="text" class="form-control @error('codigo_postal') is-invalid @enderror" name="codigo_postal" value="{{ old('codigo_postal') }}" size="5">

                                @error('codigo_postal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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