<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $table = 'stocks';


    public function producto()
    {
    	return $this->belongsTo('App\Producto', 'id_producto', 'id_producto');
    }

    public function color()
    {
    	return $this->belongsTo('App\Color', 'id_color', 'id_color');
    }

    public function talla()
    {
        return $this->belongsTo('App\Talla', 'id_talla', 'id_talla');
    }


}
