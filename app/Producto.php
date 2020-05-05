<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'productos';

    protected $primaryKey = 'id_producto';


    public function stock()
   	{
   		return $this->hasMany('App\Stock', 'id_producto', 'id_producto');
   	}

    public function factura()
    {
      return $this->belongsToMany('App\Factura', 'detalles', 'id_producto', 'id_factura')
        ->withPivot('precio_detalle', 'created_at', 'updated_at');
    }


}
