<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Talla;

class TallaController extends Controller
{

    //MOSTRAR TODAS LAS TALLAS

    public function show()
    {
        $tallas = Talla::get();

        return view('admin.mostrarTallas', [ 'tallas' => $tallas]);
    }

    //CREAR TALLA

    public function create(Request $request)
    {
    	$validator = TallaController::validator($request);

    	if($validator->fails())
    	{
            return redirect()->back()->withErrors($validator)->withInput();
    	}
    	else
    	{
	    	$talla = new Talla;

	    	$talla->nombre_talla = $request->nombre_talla;

	    	$talla->save();

            return redirect()->back()->with('success', true);
    	}
    }

    //VALIDAR DTOS

    protected function validator(Request $request)
    {
    	return Validator::make($request->all(), [
    		'nombre_talla' => 'required|max:20|regex:/^[\w-]*$/|unique:tallas'
    	]);
    }

}
