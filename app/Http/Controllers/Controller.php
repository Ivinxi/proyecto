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
    	$novedades = \App\Producto::orderBy('created_at', 'desc')->take(9)->get();

    	$ofertas = \App\Producto::where('oferta_porcentaje', '!=', null)->orWhere('oferta_plana', '!=', null)->inRandomOrder()->take(9)->get();


    	// shuffle()
    	$novedades = $novedades->shuffle();

    	$ofertas = $ofertas->shuffle();

    	return view('welcome', [ 'novedades' => $novedades , 'ofertas' => $ofertas ]);
    }
}
