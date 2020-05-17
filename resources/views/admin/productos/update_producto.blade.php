@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row justify-content-center">

		<div class="col-md-8">

			<form action="{{ route('admin/productos/update', [$producto]) }}" method="POST">
				@csrf
		
				<div class="row">

					<div class="form-group col-md-6">
				    	<label for="nombre">Nombre</label>
				    	<input type="text" id="name" class="form-control @error('nombre_producto') is-invalid @enderror" name="nombre_producto" value="{{ old('nombre_producto', $producto->nombre_producto) }}" required>
                        @error('nombre_producto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
					</div>						

					<div class="form-group col-md-6">
				    	<label for="marca">Marca</label>
				    	<input type="text" id="name" class="form-control @error('marca') is-invalid @enderror" name="marca" value="{{ old('marca', $producto->marca) }}" required>
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
				    	<input type="text" id="name" class="form-control @error('categoria') is-invalid @enderror" name="categoria" value="{{ old('categoria', $producto->categoria) }}" required>
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
                           	<option value="mujer" {{ old('target', $producto->target) == 'mujer' ? "selected":"" }}>Mujer</option>
							<option value="unisex-ad" {{ old('target', $producto->target) == 'unisex-ad' ? "selected":"" }}>Unisex adultos</option>
							<option value="niño" {{ old('target', $producto->target) == 'niño' ? "selected":"" }}>Niño</option>
							<option value="niña" {{ old('target', $producto->target) == 'niña' ? "selected":"" }}>Niña</option>
							<option value="unisex-ni" {{ old('target', $producto->target) == 'unisex-ni' ? "selected":"" }}>Unisex niños</option>
                        </select>
					</div>

				</div>

				<div class="row">

					<div class="form-group col-md-6">
				    	<label for="material">Material</label>
				    	<input type="text" id="name" class="form-control @error('material') is-invalid @enderror" name="material" value="{{ old('material', $producto->material) }}">
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
                           	<option value="verano" {{ old('temporada', $producto->temporada) == 'verano' ? "selected":"" }}>Verano</option>
							<option value="otoño" {{ old('temporada', $producto->temporada) == 'otoño' ? "selected":"" }}>Otoño</option>
							<option value="invierno" {{ old('temporada', $producto->temporada) == 'invierno' ? "selected":"" }}>Invierno</option>
                        </select>
					</div>		
						
				</div>

				<div class="row">

					<div class="form-group col-md-6">
				    	<label for="precio">Precio</label>
				    	<input type="text" id="name" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio', $producto->precio) }}" required>
                        @error('precio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
					</div>

					<div class="form-group col-md-6">
				    	<label for="oferta">Oferta</label>
				    	<input type="text" id="oferta" class="form-control @error('oferta') is-invalid @enderror" name="oferta" value="{{ $producto->oferta_porcentaje ? old('oferta', $producto->oferta_porcentaje):old('oferta', $producto->oferta_plana) }}" placeholder="Oferta">

						<div class="form-check text-right">
						    <input class="form-check-input" type="checkbox" value="porcentaje" id="porcentaje" name="porcentaje" {{ old('porcentaje', $producto->oferta_porcentaje) ? "checked":"" }}>
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
				    	<textarea id="name" maxlength="500" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion">{{ old('descripcion', $producto->descripcion) }}</textarea>
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
				    	<input type="file" id="name" class="form-control @error('foto_producto') is-invalid @enderror" name="foto_producto" value="{{ old('material') }}">
                        @error('foto_producto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
					</div>						
					
				</div>

			<button type="submit" class="btn btn-primary btn-sm btn-admin">Guardar</button>
			<a href="{{ route('admin/productos') }}"><button type="button" class="btn btn-primary btn-sm btn-admin">Volver</button></a>

			</form>

		</div>

	</div>

</div>

@endsection