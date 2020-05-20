@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

	<div class="row justify-content-center">

		<div class="col-md-8">

			<form action="{{ route('admin/colors/update', [$color]) }}" method="POST">
				@csrf

				<div class="form-group">
				    <label for="nombre_color">Color</label>
				    <input type="text" class="form-control" id="nombre_color" name="nombre_color" value="{{ $color->nombre_color }}" required>
				    @if($errors->has('nombre_color'))
		            	@foreach ($errors->get('nombre_color') as $message)
		                	<span class="help-block text-error">{{ $message }}</span>
		              	@endforeach
		            @endif				   
				</div>	

				<button type="submit" class="btn btn-primary btn-sm btn-admin">Guardar</button>
				<a href="{{ route('admin/colors') }}"><button type="button" class="btn btn-primary btn-sm btn-admin">Volver</button></a>

			</form>

		</div>

	</div>

</div>

@endsection