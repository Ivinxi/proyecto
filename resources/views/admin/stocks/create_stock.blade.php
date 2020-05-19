@section('modalStock')

<div class="modal fade" id="modalStock" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Añadir stock</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('admin/productos/insertStock') }}" method="POST" id="createStock">
					@csrf
					<input type="hidden" name="id_producto" id="id_producto">
					<div class="form-group">
				    	<label for="id_talla">A</label>

				    	<select class="form-control @error('id_talla') is-invalid @enderror" name="id_talla" id="id_talla">
							@foreach($tallas as $talla)
								<<option value="{{ $talla->id_talla }}">{{ $talla->nombre_talla }}</option>
							@endforeach
				    	</select>


                        @error('id_talla')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				   
					</div>

					<div class="form-group">
				    	<label for="id_color">A</label>

				    	<select class="form-control @error('id_color') is-invalid @enderror" name="id_color" id="id_color">
							@foreach($colors as $color)
								<<option value="{{ $color->id_color }}">{{ $color->nombre_color }}</option>
							@endforeach
				    	</select>


                        @error('id_color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror	   
					</div>

					<div class="form-group">
				    	<label for="cantidad_stock">Cantidad</label>
				    	<input type="number" id="cantidad_stock" class="form-control @error('cantidad_stock') is-invalid @enderror" name="cantidad_stock" value="{{ old('cantidad_stock') }}" required>

                        @error('cantidad_stock')
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