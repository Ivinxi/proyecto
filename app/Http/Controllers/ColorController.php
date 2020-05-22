<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;

class ColorController extends Controller
{

    //MOSTRAR TODOS LOS COLORES

    public function show()
    {
        $colors = Color::withTrashed()
                    ->orderBy('deleted_at')
                    ->paginate(15);
                    
        return view('admin.colors.show_color', [ 'colors' => $colors]);
    }

    //CREAR COLOR

    public function create()
    {
    	Color::create($this->validator());

        return redirect(route('admin/colors'))->with('create', true);
    }

    //MOSTRAR UN COLOR

    public function edit(Color $color)
    {
        return view('admin.colors.update_color', [ 'color' => $color]);
    }

    //MODIFICAR COLOR

    public function update(Color $color)
    {
        $color->update($this->validator());

        return redirect(route('admin/colors'))->with('update', true);
    }

    //ELIMINAR UN COLOR

    public function delete(Color $color)
    {
        $color->delete();

        return redirect(route('admin/colors'))->with('delete', true);      
    }

    //RESTAURAR COLOR

    public function restore($id_color)
    {
        Color::withTrashed()->find($id_color)->restore();

        return redirect(route('admin/colors'))->with('restore', true);
    }

    //VALIDAR DATOS

    protected function validator()
    {
        return request()->validate([
            'nombre_color' => 'required|max:20|regex:/^[A-zÀ-ú ]*$/|unique:colors'
        ]);
    }

}
