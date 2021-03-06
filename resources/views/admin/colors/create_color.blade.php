@section('modalcreate')

<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Añadir color</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('admin/colors/insert') }}" method="POST">
					@csrf

					<div class="form-group">
				    	<label for="name">Color</label>
				    	<input type="text" id="name" class="form-control @error('nombre_color') is-invalid @enderror" name="nombre_color" value="{{ old('nombre_color') }}" required>

                        @error('nombre_color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				   
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