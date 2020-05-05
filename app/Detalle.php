<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle extends Model
{
    //
    protected $table = 'detalles';

    protected $primaryKey = 'id_detalle';

    /*
    public function factura()
    {
        return $this->belongsTo('App\Factura', 'id_factura', 'id_factura');
    }

    public function producto()
    {
        return $this->belongsTo('App\Producto', 'id_producto', 'id_producto');
    }*/

}
