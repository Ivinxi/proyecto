<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura Bloom Store</title>
</head>
<body>
	<h1 style="color:#32a6a5; text-align: center;"><img height=80px style="vertical-align:bottom; margin: 30px 30px 0 30px" src="/images/logo.png">Factura - Bloom Store</h1>
	<br>
	<h2 style="text-align: center"><span style="border-bottom:1px black solid">Datos de facturación:</span></h2>
	<div style="text-align: center;">
		<p>Nombre: {{ $nombre_completo }}</p>
		<p>Dirección: {{ $direccion }} en {{ $localidad . ' (' . $codigo_postal . '), ' . $provincia }}</p>
		<p>Método de pago: {{ $metodo_pago }}</p>
	</div>
	<br>
	<h2 style="text-align: center"><span style="border-bottom:1px black solid">Datos del pedido:</span></h2>
	<div>
		<table style="border-spacing: 30px 20px; margin: 0 auto">
			<tr>
				<th>Producto</th>
				<th>Talla</th>
				<th>Color</th>
				<th>Cantidad</th>
				<th>Precio</th>
			</tr>

			@foreach($compras as $producto)
			<tr>
				<td>{{$producto->name}}</td>
				<td>{{$producto->attributes->talla}}</td>
				<td>{{$producto->attributes->color}}</td>
				<td>{{$producto->quantity}}</td>
				<td>{{$producto->price}}</td>
			</tr>
			@endforeach

			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td><p><strong>Total:</strong></p></td>
				<td><strong>{{$precio_total}}€</strong></td>
			</tr>

		</table>	
	</div>
</body>
</html>