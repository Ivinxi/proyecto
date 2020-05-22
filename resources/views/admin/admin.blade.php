@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-2 offset-md-3 nsense">
			<a class="yokse" href="productos"><img class="card-img-top" src="/images/productos.png" alt="Card image cap"></a>
		</div>
		<div class="col-md-2">
			<a class="yokse" href="tallas"><img class="card-img-top" src="/images/tallas.png" alt="Card image cap"></a>
		</div>
		<div class="col-md-2">
			<a class="yokse" href="colores"><img class="card-img-top" src="/images/colores.png" alt="Card image cap"></a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 offset-md-4">
			<a class="yokse" href="usuarios"><img class="card-img-top" src="/images/usuarios.png" alt="Card image cap"></a>
		</div>
		<div class="col-md-2">
			<a class="yokse" href="facturas"><img class="card-img-top" src="/images/facturas.png" alt="Card image cap"></a>
		</div>
	</div>
</div>
@endsection