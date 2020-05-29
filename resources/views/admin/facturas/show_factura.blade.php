@extends('admin.layouts.app_admin')
@include('admin.layouts.alertas')

@section('titulo')
	FACTURAS
@endsection

@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header text-center">
						<span class="titulosAdmin">@yield('titulo')</span>
					</div>
					<div class="card-body">

						@yield('alertas')

						<table class="table">
							<tr class="text-center">
								<th>Factura</th>
								<th>Usuario</th>
								<th>Total</th>
								<th>Fecha</th>
								<th>Estado</th>
								<th>PDF</th>	
							</tr>
							
							@foreach($facturas as $factura)
								<tr class="text-center">
									<td>{{ $factura->id_factura }}</td>
									<td>{{ $factura->usuario->email }}</td>
									<td>{{ $factura->precio_factura }}€</td>
									<td>{{ $factura->created_at }}</td>
									<td class="capitalize">{{ $factura->estado }}</td>
									<td><a href="{{ route('downloadPDF', $factura->pdf_factura) }}"><i class="fas fa-file-download fa-lg"></i></a></td>
								</tr>
							@endforeach

						</table>

						{{ $facturas->links() }}
						<a href="{{ route('admin/home') }}"><button type="button" class="btn btn-primary btn-sm btn-admin">Volver</button></a>	
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection