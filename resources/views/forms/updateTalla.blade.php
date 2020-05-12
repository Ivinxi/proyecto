@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row justify-content-center">

		<div class="col-md-8">

			@if(session('success') == true)
				<h2>ÉXITO</h2>
			@endif

			<form action="{{ route('updateTalla', [$talla]) }}" method="POST">
				@csrf

				<div class="form-group">
				    <label for="name">Talla</label>
				    <input type="text" class="form-control" id="name" name="nombre_talla" value="{{ $talla->nombre_talla }}">
				     @if($errors->has('nombre_talla'))
		              @foreach ($errors->get('nombre_talla') as $message)
		                <span class="help-block text-error">{{ $message }}</span>
		              @endforeach
		            @endif				   
				</div>	

				<button type="submit" class="btn btn-primary btn-sm btn-admin">Guardar</button>
				<a href="{{ route('tallas') }}"><button type="button" class="btn btn-primary btn-sm btn-admin">Volver</button></a>

			</form>

		</div>

	</div>

</div>

@endsection