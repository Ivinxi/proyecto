<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura Bloom Store</title>
</head>
<body style="text-transform: capitalize;">
	<h1 style="color:#32a6a5; text-align: center;">Factura - Bloom Store</h1>
	<br>
	<h2 style="text-align: center"><span style="border-bottom:1px black solid">Datos de facturación:</span></h2>
	<div style="text-align: center; height: 200px">
		<div style="text-align: left; display: inline-block; margin-left: auto; margin-right: auto; border">
			<p><strong>Nombre:</strong><br> {{ $nombre_completo }}</p>
			<p><strong>Dirección:</strong><br> {{ $direccion }} <br> {{ $localidad . ' (' . $codigo_postal . '), ' . $provincia }}</p>
			<p><strong>Método de pago:</strong><br> {{ $metodo_pago }}</p>
		</div>
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