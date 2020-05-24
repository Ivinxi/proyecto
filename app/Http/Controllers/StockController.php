<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;

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

}
