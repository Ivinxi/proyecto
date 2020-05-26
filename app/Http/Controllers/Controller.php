<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {

        $p1 = \App\Producto::whereHas('stock', function($query){
            $query->where('cantidad_stock', '>', 0);
        })->inRandomOrder()->first();

        $p2 = $p1;

        if($p1 != null || $p2 != null){
            while ($p1->categoria == $p2->categoria){
                $p1 = \App\Producto::whereHas('stock', function($query){
                    $query->where('cantidad_stock', '>', 0);
                })->inRandomOrder()->first();
            }
        }

    	$novedades = \App\Producto::whereHas('stock', function($query){
    		$query->where('cantidad_stock', '>', 0);
    	})->orderBy('created_at', 'desc')->take(9)->get();

    	$ofertas = \App\Producto::whereHas('stock', function($query){
    		$query->where('cantidad_stock', '>', 0);
    	})->where('oferta_porcentaje', '!=', null)->orwhereHas('stock', function($query){
            $query->where('cantidad_stock', '>', 0);
        })->where('oferta_plana', '!=', null)->inRandomOrder()->take(9)->get();

		$ultimas = \App\Producto::query()->join('stocks', 'stocks.id_producto', '=', 'productos.id_producto')
		    ->select('productos.*')
		    ->selectRaw('sum(stocks.cantidad_stock) as score')
		    ->groupBy('stocks.id_producto')
		    ->having('score', '<', 10)
		    ->having('score', '>', 0)
		    ->take(9)
		    ->get();

    	//SHUFFLE

		$ultimas = $ultimas->shuffle();

    	$novedades = $novedades->shuffle();

    	$ofertas = $ofertas->shuffle();

    	return view('welcome', [ 'p1' => $p1, 'p2' => $p2, 'novedades' => $novedades, 'ofertas' => $ofertas, 'ultimas' => $ultimas, ]);
    }
}
