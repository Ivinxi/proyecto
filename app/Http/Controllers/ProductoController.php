<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Stock;
use App\Talla;
use App\Color;


class ProductoController extends Controller
{

	//VISTA DE UN SOLO PRODUCTO
    public function producto($target, $categoria, Producto $producto)
    {

        $relacionados = Producto::where('id_producto', '!=', $producto->id_producto)
                    ->where('target', $target)
                    ->where('marca', $producto->marca)
                    ->whereHas('stock', function($query){
                        $query->where('cantidad_stock', '>', 0);
                    })->inRandomOrder()->take(5)->get();

        return view('producto', ['producto' => $producto, 'relacionados' => $relacionados]);
    }

    //VISTA AL SELECCIONAR UN TARGET

    public function target($target){

        $unisex = 'unisex-ad';

        if($target == 'niño' || $target == 'niña'){
            $unisex = 'unisex-ni';
        }

        $productos = Producto::whereHas('stock', function($query){
            $query->where('cantidad_stock', '>', 0);
        })->where('target', $target)->orwhereHas('stock', function($query){
            $query->where('cantidad_stock', '>', 0);
        })->where('target', $unisex)->orderBy('updated_at', 'desc')->paginate(20);
        
        return view('secciones', ['productos' => $productos]);
    }

    //VISTA AL SELECCIONAR UNA CATEGORÍA (DE UN TARGET)

    public function categoria($target, $categoria){

        $unisex = 'unisex-ad';

        if($target == 'niño' || $target == 'niña'){
            $unisex = 'unisex-ni';
        }

        $productos = Producto::whereHas('stock', function($query) {
            $query->where('cantidad_stock', '>', 0);
        })->where('target', $target)->where('categoria', $categoria)
        ->orwhereHas('stock', function($query) {
            $query->where('cantidad_stock', '>', 0);
        })->where('target', $unisex)->where('categoria', $categoria)->orderBy('updated_at', 'desc')->paginate(20);

        return view('secciones', ['productos' => $productos]);
    }

    //MOSTRAR TODOS LOS PRODUCTOS

    public function show()
    {
        $productos = Producto::withTrashed()
                    ->orderBy('deleted_at')
                    ->paginate(15);

        $tallas = Talla::withTrashed()->get();

        $colors = Color::withTrashed()->get();

    	$stocks = Stock::join('productos', 'productos.id_producto', 'stocks.id_producto')
    				->join('colors', 'colors.id_color', 'stocks.id_color')
    				->join('tallas', 'tallas.id_talla', 'stocks.id_talla')
    				->select('stocks.id', 'stocks.id_producto', 'stocks.cantidad_stock', 'colors.nombre_color', 'tallas.nombre_talla')
    				->get();

        return view('admin.productos.show_producto', [ 'productos' => $productos, 'stocks' => $stocks, 'tallas' => $tallas, 'colors' => $colors ]);
    }

    // CREAR UN PRODUCTO

    public function create()
    {
        $producto = Producto::create($this->validator());

        $this->uploadFoto($producto);

		$this->cambiaroferta($producto);

        return redirect()->back()->with('create', true);
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

        $this->uploadFoto($producto);

        $this->cambiaroferta($producto);

        return redirect()->back()->with('update', true);
    }

    //ELIMINAR

    public function delete(Producto $producto)
    {
        $producto->delete();

        return redirect()->back()->with('delete', true);      
    }

    //RESTAURAR USUARIO

    public function restore($id_producto)
    {
        Producto::withTrashed()->find($id_producto)->restore();

        return redirect()->back()->with('restore', true);
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
            'foto_producto' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    //CAMBIA O ACTUALIZA LAS OFERTAS

    protected function cambiarOferta(Producto $producto)
    {
        if (request()->oferta > 0 && request()->porcentaje)
     	{
     		$producto->oferta_porcentaje = request()->oferta;
     		$producto->oferta_plana = null;

            if(request()->oferta > 99){
                $producto->oferta_porcentaje = null;
            }
     	}
        elseif (request()->oferta > 0 && !request()->porcentaje)
     	{
     		$producto->oferta_plana = request()->oferta;
     		$producto->oferta_porcentaje = null;
     	}
        elseif (request()->oferta == 0)
        {
            $producto->oferta_porcentaje = null;
            $producto->oferta_plana = null;
        }

     	$producto->save();
    }

    //GUARDAR FOTO EN LOCAL

    protected function uploadFoto(Producto $producto)
    {

        if ($file = request()->file('foto_producto')) {

            $upload_path = 'images/';

            $fileName = date('YmdHis') . '.' . $file->getClientOriginalExtension();

            $image_url = $upload_path . $fileName;

            $file->move(public_path('images'), $fileName);

            $producto->foto_producto = $image_url;

        }
        $producto->save();
    }
}