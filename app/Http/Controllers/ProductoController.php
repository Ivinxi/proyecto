<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;


class ProductoController extends Controller
{
    public function show()
    {
        return Producto::where('precio', '<', '50')->get('nombre_producto');
    }

}
