<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;

class StockController extends Controller
{

    // CREAR UN STOCK

    public function create()
    {
        $stock = $this->validator();

        $as = Stock::where('id_producto', request()->id_producto)->where('id_talla', request()->id_talla)->where('id_color', request()->id_color)->first();


        if($as)
        {
            $as->cantidad_stock = $as->cantidad_stock + request()->cantidad_stock;
            $as->save();
        }
        else
        {
            Stock::create($stock);
        }


        return redirect(route('admin/productos'))->with('create', true);
    }

    protected function sumarStock(Stock $stock) 
    {
        
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
