<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Factura;
use App\Stock;
use App\Usuario;
use Cart;
use Auth;
use PDF;
use Storage;

class FacturaController extends Controller
{
    public function pago()
    {

    	$datos = request()->validate([
    		'nombre_completo' => 'required|max:50|regex:/^[A-zÀ-ú ]*$/',
    		'direccion' => 'required|max:80|regex:/^[A-zÀ-ú0-9\,\.\º\-\ª\/ ]*$/',
    		'telefono' => 'required|size:9|regex:/^[0-9 ]*$/',
    		'provincia' => 'required|max:20|regex:/^[A-zÀ-ú ]*$/',
    		'localidad' => 'required|max:30|regex:/^[A-zÀ-ú ]*$/',
    		'codigo_postal' => 'required|size:5|regex:/^[0-9 ]*$/',
    		'metodo_pago' => 'required',
    	]);

    	if(request()->metodo_pago == 'tarjeta'){

    		$datos_tarjeta = request()->validate([
    			'nombre_completo' => 'required|max:50|regex:/^[A-zÀ-ú ]*$/',
    			'num_tarjeta' => 'required|size:16|regex:/^[0-9 ]*$/',
    			'fecha_tarjeta' => 'required|regex:/^[0-9\-\/]',
    			'cvc' => 'required|size:3|regex:/^[0-9 ]*$/',
    		]);
    	}

    	$carrito = Cart::session(Auth::user()->id_usuario)->getContent();
    	$totalFactura = Cart::session(Auth::user()->id_usuario)->getTotal();
    	$stocks = collect([]);

    	//COMPROBAR SI HAY SUFICIENTE STOCK DE LOS PRODUCTOS QUE COMPRA, SI NO TE DEVUELVE AL CARRITO

    	foreach ($carrito as $carrito) {

    		$stock = Stock::find($carrito->id);

    		//STOCK AGOTADO
    		if (!$stock){
    			return redirect(route('mostrarCarrito'))->with('agotado'.$carrito->id, true);
    		}

    		//STOCK NO SUFICIENTE
    		if ($stock->cantidad_stock < $carrito->quantity){
    			return redirect(route('mostrarCarrito'))->with('exceso'.$carrito->id, true);
    		}

    		$stocks->push($stock);

    	}

    	//CREACIÓN FACTURA

    	$factura = Factura::create([
    		'id_usuario' => Auth::user()->id_usuario,
    		'precio_factura' => Cart::session(Auth::user()->id_usuario)->getTotal(),
    		'metodo_pago' => request()->metodo_pago,
    	]);

    	//CREACIÓN DEL PDF DE LA FACTURA

    	$datos = $this->datosPDF();
    	$pdf = PDF::loadView('pdf.factura', $datos);
    	$fileName = $factura->id_factura . '_' . date('Ymd') . '.pdf';
    	$pdf_url = 'facturas/' . $fileName;
    	$pdf->save($pdf_url);
    	$factura->pdf_factura = $fileName;
    	$factura->save();


    	// RESTAR LA CANTIDAD DEL PRODUCTO EN EL CARRITO AL STOCK

    	foreach($stocks as $stock){
    		$stock->cantidad_stock = $stock->cantidad_stock - Cart::session(Auth::user()->id_usuario)->get($stock->id)->quantity;

    		$stock->save();

    		//CREACIÓN DETALLE

    		$factura->stock()->save($stock, [
    			'cantidad_detalle' => Cart::session(Auth::user()->id_usuario)->get($stock->id)->quantity,
    			'precio_detalle' => Cart::session(Auth::user()->id_usuario)->get($stock->id)->price,

    		]);


    		if($stock->cantidad_stock == 0){

    			$stock->delete();
    		}

    		Cart::session(Auth::user()->id_usuario)->clear();

    		return redirect('/')->with('compra_exito', true);
    	}

 		return $pdf->download($fileName);
    }


    public function datosPDF(){
    	$datos = [
    		'nombre_completo' => request()->nombre_completo,
     		'direccion' => request()->direccion,
    		'telefono' => request()->telefono,
    		'provincia' => request()->provincia,
    		'localidad' => request()->localidad,
    		'codigo_postal' => request()->codigo_postal,
    		'metodo_pago' => request()->metodo_pago,
    		'compras' => Cart::session(Auth::user()->id_usuario)->getContent(),
    		'precio_total' => Cart::session(Auth::user()->id_usuario)->getTotal(),
    	];

    	return $datos;
    }

    public function downloadPDF($ruta){

        return response()->file(public_path('facturas') . "/" . $ruta);
    }
}
