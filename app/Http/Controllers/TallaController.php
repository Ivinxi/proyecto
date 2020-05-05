<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Talla;

class TallaController extends Controller
{
    public function show()
    {
        return Talla::find(1);
    }

}
