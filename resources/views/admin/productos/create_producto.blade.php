@section('modalcreate')

<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Añadir producto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ route('admin/productos/insert') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">

						<div class="form-group col-md-6">
					    	<label for="nombre">Nombre</label>
					    	<input type="text" id="name" class="form-control @error('nombre_producto') is-invalid @enderror" name="nombre_producto" value="{{ old('nombre_producto') }}" placeholder="Nombre del producto" required>
	                        @error('nombre_producto')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror 
						</div>						

						<div class="form-group col-md-6">
					    	<label for="marca">Marca</label>
					    	<input type="text" id="name" class="form-control @error('marca') is-invalid @enderror" name="marca" value="{{ old('marca') }}" placeholder="Marca" required>
	                        @error('marca')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror 
						</div>

					</div>

					<div class="row">

						<div class="form-group col-md-6">
					    	<label for="categoria">Categoría</label>
					    	<input type="text" id="name" class="form-control @error('categoria') is-invalid @enderror" name="categoria" value="{{ old('categoria') }}" placeholder="Categoría" required>
	                        @error('categoria')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror 
						</div>						
						
						<div class="form-group col-md-6">
					    	<label for="target">Target</label>
                            <select id="target" class="form-control" name="target">
                              	<option value="hombre">Hombre</option>
                               	<option value="mujer" {{ old('target') == 'mujer' ? "selected":"" }}>Mujer</option>
								<option value="unisex-ad" {{ old('target') == 'unisex-ad' ? "selected":"" }}>Unisex adultos</option>
								<option value="niño" {{ old('target') == 'verano' ? "niño":"" }}>Niño</option>
								<option value="niña" {{ old('target') == 'verano' ? "niña":"" }}>Niña</option>
								<option value="unisex-ni" {{ old('target') == 'unisex-ni' ? "selected":"" }}>Unisex niños</option>
                            </select>
						</div>

					</div>

					<div class="row">

						<div class="form-group col-md-6">
					    	<label for="material">Material</label>
					    	<input type="text" id="name" class="form-control @error('material') is-invalid @enderror" name="material" value="{{ old('material') }}" placeholder="Material">
	                        @error('material')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror 
						</div>

						<div class="form-group col-md-6">
				    	<label for="temporada">Temporada</label>
                            <select id="temporada" class="form-control" name="temporada">
                               	<option value="primavera">Primavera</option>
                               	<option value="verano" {{ old('temporada') == 'verano' ? "selected":"" }}>Verano</option>
								<option value="otoño" {{ old('temporada') == 'otoño' ? "selected":"" }}>Otoño</option>
								<option value="invierno" {{ old('temporada') == 'invierno' ? "selected":"" }}>Invierno</option>
                            </select>
						</div>		
							
					</div>

					<div class="row">

						<div class="form-group col-md-6">
					    	<label for="precio">Precio</label>
					    	<input type="text" id="name" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio') }}" placeholder="Precio" required>
	                        @error('precio')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror 
						</div>

						<div class="form-group col-md-6">
					    	<label for="oferta">Oferta</label>
					    	<input type="text" id="oferta" class="form-control @error('oferta') is-invalid @enderror" name="oferta" value="{{ old('oferta') }}"placeholder="Oferta">

							<div class="form-check text-right">
							    <input class="form-check-input" type="checkbox" value="porcentaje" id="porcentaje" name="porcentaje" {{ old('porcentaje') ? "checked":"" }}>
							    <label class="form-check-label" for="porcentaje">
							        Porcentaje
							    </label>
							</div>

	                        @error('oferta')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror 
						</div>					
						
					</div>

					<div class="row">

						<div class="form-group col-md-12">
					    	<label for="descripcion">Descripción</label>
					    	<textarea id="name" maxlength="500" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" placeholder="Descripción del producto"></textarea>
	                        @error('descripcion')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror 
						</div>				
						
					</div>

					<div class="row">

						<div class="form-group col-md-6 offset-md-3">
					    	<label for="foto_producto">Foto</label>
					    	<input type="file" id="foto_producto" class="form-control @error('foto_producto') is-invalid @enderror" name="foto_producto" value="{{ old('foto_producto') }}">
	                        @error('foto_producto')
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