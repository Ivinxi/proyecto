<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Factura;

class FacturaController extends Controller
{
    public function show()
    {
    	$factura = Factura::find(2);
    	
        foreach($factura->producto as $productos){
        	echo $productos->nombre_producto;
        } 
    }


}
