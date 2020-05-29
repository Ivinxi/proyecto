@extends('admin.layouts.app_admin')

@section('content')
<div class="container principal py-5">
	<div class="row">
		<div class="col-md-2 offset-md-3 nsense">
			<a class="yokse" href="{{route('admin/productos')}}"><img class="card-img-top" src="/images/productos.png" alt="Card image cap"></a>
		</div>
		<div class="col-md-2">
			<a class="yokse" href="{{route('admin/tallas')}}"><img class="card-img-top" src="/images/tallas.png" alt="Card image cap"></a>
		</div>
		<div class="col-md-2">
			<a class="yokse" href="{{route('admin/colors')}}"><img class="card-img-top" src="/images/colores.png" alt="Card image cap"></a>
		</div>
	</div>

	<div class="row py-5">
		<div class="col-md-2 offset-md-4">
			<a class="yokse" href="{{route('admin/usuarios')}}"><img class="card-img-top" src="/images/usuarios.png" alt="Card image cap"></a>
		</div>
		<div class="col-md-2">
			<a class="yokse" href="{{route('admin/facturas')}}"><img class="card-img-top" src="/images/facturas.png" alt="Card image cap"></a>
		</div>
	</div>
</div>
@endsection