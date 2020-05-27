@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

	<div class="row justify-content-center">

		<div class="col-md-8">

			<form action="{{ route('admin/tallas/update', [$talla]) }}" method="POST">
				@csrf

				<div class="form-group">
				    <label for="nombre_talla">Talla</label>
				    <input type="text" class="form-control @error('nombre_talla') is-invalid @enderror" id="nombre_talla" name="nombre_talla" value="{{ $talla->nombre_talla }}" required>
				     @if($errors->has('nombre_talla'))
		              @foreach ($errors->get('nombre_talla') as $message)
		                <span class="help-block text-error">{{ $message }}</span>
		              @endforeach
		            @endif				   
				</div>	

				<button type="submit" class="btn btn-primary btn-sm btn-admin">Guardar</button>
				<a href="{{ route('admin/tallas') }}"><button type="button" class="btn btn-primary btn-sm btn-admin">Volver</button></a>

			</form>

		</div>

	</div>

</div>

@endsection