<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;


class ProductoController extends Controller
{


	//MOSTRAR TODOS LOS PRODUCTOS

    public function show()
    {
        $productos = Producto::get();

        return view('admin.productos.show_producto', [ 'productos' => $productos]);
    }

    // CREAR UN PRODUCTO

    public function create()
    {
        $producto = Producto::create($this->validator());

		$this->cambiaroferta($producto);

        return redirect(route('admin/productos'))->with('create', true);
    }

    //MOSTRAR UN PRODUCTO

    public function edit(Producto $producto)
    {
        return view('admin.productos.update_producto', [ 'producto' => $producto]);
    }

    //MODIFICAR PRODUCTO

    public function update(Producto $producto)
    {
        $producto->update($this->validator());

        $this->cambiaroferta($producto);

        return redirect(route('admin/productos'))->with('update', true);
    }

    //VALIDAR DATOS

    protected function validator()
    {
        return request()->validate([
            'nombre_producto' => 'required|max:20|regex:/^[A-zÀ-ú ]*$/',
            'descripcion' => 'nullable|max:500',
            'precio' => 'required|numeric|between:0,9999.99',
            'oferta' => 'nullable|numeric|between:0,9999.99',
            'marca' => 'required|max:20|regex:/^[A-zÀ-ú0-9 ]*$/',
            'temporada' => '',
            'target' => '',
            'material' => 'nullable|max:20|regex:/^[A-zÀ-ú ]*$/',
            'categoria' => 'required|max:20|regex:/^[A-zÀ-ú ]*$/',
        ]);
    }

    protected function cambiarOferta(Producto $producto)
    {
        if (request()->oferta && request()->porcentaje)
     	{
     		$producto->oferta_porcentaje = request()->oferta;
     		$producto->oferta_plana = null;
     	}
     	else
     	{
     		$producto->oferta_plana = request()->oferta;
     		$producto->oferta_porcentaje = null;
     	}

     	$producto->save();
    }
}
