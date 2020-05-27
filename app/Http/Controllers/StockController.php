<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Producto;
use App\Color;
use App\Talla;
use Cart;
use Auth;

class StockController extends Controller
{

    // CREAR UN STOCK

    public function create()
    {
        $stocknuevo = $this->validator();

        $stock = Stock::withTrashed()->where('id_producto', request()->id_producto)->where('id_talla', request()->id_talla)->where('id_color', request()->id_color)->first();


        if($stock)
        {
            if($stock->trashed())
            {
                $stock->restore();
            }
            $stock->cantidad_stock = $stock->cantidad_stock + request()->cantidad_stock;
            $stock->save();
        }
        else
        {
            Stock::create($stocknuevo);
        }


        return redirect()->back()->with('create', true);
    }

    protected function restarStock()
    {
        $stocknuevo = $this->validator();

        $stock = Stock::where('id_producto', request()->id_producto)->where('id_talla', request()->id_talla)->where('id_color', request()->id_color)->first();

        $stock->cantidad_stock = $stock->cantidad_stock - request()->cantidad_stock;

        if($stock->cantidad_stock < 0)
        {
            $stock->cantidad_stock = 0;
        }

        $stock->save();      
    }

    //ELIMINAR UN STOCK

    public function delete(Stock $stock)
    {
        $stock->cantidad_stock = 0;

        $stock->save();

        $stock->delete();

        return redirect()->back()->with('delete', true);
    }

    //VALIDAR DATOS

    protected function validator()
    {
        return request()->validate([
            'id_producto' => '',
            'id_talla' => '',
            'id_color' => '',
            'cantidad_stock' => 'required|numeric|regex:/^[0-9]*$/',
        ]);
    }


    public function anadirCarrito(Producto $producto){

        if(Auth::check()){

            $validate = request()->validate([
                'id_talla' => 'required|numeric',
                'id_color' => 'required|numeric',
            ]);

            if ($validate && Auth::check()){

                $usuario = Auth::user()->id_usuario;
                $stock = Stock::where('id_producto', $producto->id_producto)->where('id_talla', request()->id_talla)->where('id_color', request()->id_color)->first();
                $talla = Talla::find(request()->id_talla);
                $color = Color::find(request()->id_color);
                
                Cart::session($usuario)->add(array(
                                'id' => $stock->id,
                                'name' => $producto->nombre_producto,
                                'price' => $producto->devolverPrecio(),
                                'quantity' => 1,
                                'attributes' => array(
                                    'talla' => $talla->nombre_talla,
                                    'color' => $color->nombre_color,
                                    'marca' => $producto->marca,
                                    'foto' => $producto->foto_producto,
                                    'url' => 'target/' . $producto->target . '/categoria/' . $producto->categoria . '/producto/' . $producto->id_producto,
                                )
                ));

            }

            return redirect()->back();

        }

        return redirect('login');
    }

    public function mostrarCarrito(){
        
        if (Auth::user()){
            $usuario = auth()->user()->id_usuario;
            $carrito = Cart::session($usuario)->getcontent();


            return view('carrito', ['carrito' => $carrito]);

            }

        return redirect('login');
    }

    public function eliminarItemCarrito($id){

        Cart::session(Auth::user()->id_usuario)->remove($id);

        return redirect()->back();

    }

    public function procesarCompra(){

        return view('procesarcompra');
    }
}
