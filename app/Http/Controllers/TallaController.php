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

    //MOSTRAR UNA TALLA

    public function verTalla(Talla $talla)
    {
        return view('forms.updateTalla', [ 'talla' => $talla]);
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

    //MODIFICAR TALLA

    public function update(Request $request, Talla $talla)
    {
        $validator = TallaController::validator($request);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            $talla->nombre_talla = $request->nombre_talla;

            $talla->save();

            return redirect()->route('tallas')->with('success', true);
        }
    }

    //VALIDAR DTOS

    protected function validator(Request $request)
    {
    	return Validator::make($request->all(), [
    		'nombre_talla' => 'required|max:20|regex:/^[\w-]*$/|unique:tallas'
    	]);
    }

    //ELIMINAR UNA TALLA

    public function delete(Talla $talla)
    {

        $talla->delete();

        return redirect()->route('tallas')->with('success', true);
        
    }

}
