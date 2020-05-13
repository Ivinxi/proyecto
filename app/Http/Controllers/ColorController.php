<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Color;

class ColorController extends Controller
{

    //MOSTRAR TODOS LOS COLORES

    public function show()
    {
        $colors = Color::get();

        return view('admin.colors.show_color', [ 'colors' => $colors]);
    }

    //MOSTRAR UN COLOR
    public function edit(Color $color)
    {
        return view('admin.colors.update_color', [ 'color' => $color]);
    }

    //CREAR COLOR

    public function create(Request $request)
    {
    	$validator = ColorController::validator($request);

    	if($validator->fails())
    	{
            return redirect()->back()->withErrors($validator)->withInput();
    	}
    	else
    	{
	    	$color = new Color;

	    	$color->nombre_color = ucfirst(strtolower($request->nombre_color));

	    	$color->save();

            return redirect()->route('admin/colors')->with('success', true);
    	}
    }

    //MODIFICAR COLOR

    public function update(Request $request, Color $color)
    {
        $validator = ColorController::validator($request);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            $color->nombre_color = ucfirst(strtolower($request->nombre_color));

            $color->save();

            return redirect()->route('admin/colors')->with('success', true);
        }
    }

    //VALIDAR DATOS

    protected function validator(Request $request)
    {
    	return Validator::make($request->all(), [
    		'nombre_color' => 'required|max:20|regex:/^[A-zÀ-ú]*$/|unique:colors'
    	]);
    }

    //ELIMINAR UN COLOR

    public function delete(Color $color)
    {
        $color->delete();

        return redirect()->route('admin/colors')->with('success', true);      
    }

}
