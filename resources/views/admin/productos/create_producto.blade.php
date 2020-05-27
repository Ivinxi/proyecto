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
                            <select id="categoria" class="form-control" name="categoria">
                              	<optgroup label="Parte superior">
                              	<option value="hombre">Camisetas</option>
                              	<option value="polos" {{ old('categoria') == 'polos' ? "selected":"" }}>Polos</option>
                              	<option value="camisas" {{ old('categoria') == 'camisas' ? "selected":"" }}>Camisas</option>
                              	<option value="tops_y_blusas" {{ old('categoria') == 'tops_y_blusas' ? "selected":"" }}>Tops y Blusas</option>
                              	<option value="jerseis" {{ old('categoria') == 'jerseis' ? "selected":"" }}>Jerséis</option>
                              	<option value="sudaderas" {{ old('categoria') == 'sudaderas' ? "selected":"" }}>Sudaderas</option>
                              	<option value="chaquetas" {{ old('categoria') == 'chaquetas' ? "selected":"" }}>Chaquetas</option>
                              	<option value="abrigos" {{ old('categoria') == 'abrigos' ? "selected":"" }}>Abrigos</option>
                              	</optgroup>
                              	<optgroup label="Parte inferior">
                              	<option value="pantalones" {{ old('categoria') == 'pantalones' ? "selected":"" }}>Pantalones</option>
                              	<option value="vaqueros" {{ old('categoria') == 'vaqueros' ? "selected":"" }}>Vaqueros</option>
                              	<option value="faldas" {{ old('categoria') == 'faldas' ? "selected":"" }}>Faldas</option>
                              	<option value="shorts" {{ old('categoria') == 'shorts' ? "selected":"" }}>Shorts</option>
                              	<option value="leggins" {{ old('categoria') == 'leggins' ? "selected":"" }}>Leggins</option>
                              	</optgroup>
								<optgroup label="Completos">
								<option value="vestidos" {{ old('categoria') == 'vestidos' ? "selected":"" }}>Vestidos</option>
								<option value="trajes" {{ old('categoria') == 'trajes' ? "selected":"" }}>Trajes</option>
								<option value="monos" {{ old('categoria') == 'monos' ? "selected":"" }}>Monos</option>
								</optgroup>
								<optgroup label="Otros">
								<option value="pijamas_y_batas" {{ old('categoria') == 'pijamas_y_batas' ? "selected":"" }}>Pijamas y Batas</option>
								<option value="ropa_interior" {{ old('categoria') == 'ropa_interior' ? "selected":"" }}>Ropa interior</option>
								<option value="ropa_de_baño" {{ old('categoria') == 'ropa_de_baño' ? "selected":"" }}>Ropa de baño</option>
								<option value="zapatos" {{ old('categoria') == 'zapatos' ? "selected":"" }}>Zapatos</option>
								<option value="accesorios" {{ old('categoria') == 'accesorios' ? "selected":"" }}>Accesorios</option>
								</optgroup>
                            </select>


						</div>						
						
						<div class="form-group col-md-6">
					    	<label for="target">Target</label>
                            <select id="target" class="form-control" name="target">
                              	<option value="hombre">Hombre</option>
                               	<option value="mujer" {{ old('target') == 'mujer' ? "selected":"" }}>Mujer</option>
								<option value="unisex-ad" {{ old('target') == 'unisex-ad' ? "selected":"" }}>Unisex adultos</option>
								<option value="niño" {{ old('target') == 'niño' ? "selected":"" }}>Niño</option>
								<option value="niña" {{ old('target') == 'niña' ? "":"selected" }}>Niña</option>
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
					    	<input type="file" id="foto_producto" class="form-control @error('foto_producto') is-invalid @enderror" name="foto_producto" value="{{ old('foto_producto') }}" required>
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