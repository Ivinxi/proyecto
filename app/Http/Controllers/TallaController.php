<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talla;

class TallaController extends Controller
{

    //MOSTRAR TODAS LAS TALLAS

    public function show()
    {
        $tallas = Talla::withTrashed()
                    ->orderBy('deleted_at')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(15);

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

        return redirect()->back()->with('create', true);
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

        return redirect()->back()->with('delete', true);      
    }

    //RESTAURAR USUARIO

    public function restore($id_talla)
    {
        Talla::withTrashed()->find($id_talla)->restore();

        return redirect()->back()->with('restore', true);
    }
    //VALIDAR DTOS

    protected function validator()
    {
        return request()->validate([
            'nombre_talla' => 'required|max:20|regex:/^[\w-]*$/|unique:tallas'
        ]);
    }

}
