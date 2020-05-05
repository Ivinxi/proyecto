<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stock;

class StockController extends Controller
{
    public function show()
    {
    	return Stock::join('productos', 'productos.id_producto', 'stocks.id_producto')
    				->join('colors', 'colors.id_color', 'stocks.id_color')
    				->join('tallas', 'tallas.id_talla', 'stocks.id_talla')
    				->select('productos.nombre_producto', 'stocks.cantidad_stock', 'colors.nombre_color', 'tallas.nombre_talla')
    				->where([['nombre_producto', 'pantalon vaquero'],
    						['nombre_talla', 'S'],
    						['nombre_color', 'rojo']])
    				->get();
    }
}
