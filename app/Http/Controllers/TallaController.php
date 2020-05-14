<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talla;

class TallaController extends Controller
{

    //MOSTRAR TODAS LAS TALLAS

    public function show()
    {
        $tallas = Talla::get();

        return view('admin.tallas.show_talla', [ 'tallas' => $tallas]);
    }

    //MOSTRAR UNA TALLA

    public function edit(Talla $talla)
    {
        return view('admin.tallas.update_talla', [ 'talla' => $talla]);
    }

    //CREAR TALLA

    public function create()
    {
        Talla::create($this->validator());

        return redirect(route('admin/tallas'))->with('create', true);
    }

    //MODIFICAR TALLA

    public function update(Talla $talla)
    {
        $talla->update($this->validator());

        return redirect(route('admin/tallas'))->with('update', true);
    }

    //ELIMINAR UNA TALLA

    public function delete(Talla $talla)
    {
        $talla->delete();

        return redirect(route('admin/tallas'))->with('delete', true);      
    }

    //VALIDAR DTOS

    protected function validator()
    {
        return request()->validate([
            'nombre_talla' => 'required|max:20|regex:/^[\w-]*$/|unique:tallas'
        ]);
    }

}
