@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row justify-content-center">

		<div class="col-md-8">

			<form action="{{ route('admin/colors/update', [$color]) }}" method="POST">
				@csrf

				<div class="form-group">
				    <label for="name">Color</label>
				    <input type="text" class="form-control" id="name" name="nombre_color" value="{{ $color->nombre_color }}" require>
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