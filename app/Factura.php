<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    //
    protected $table = 'facturas';

    protected $primaryKey = 'id_factura';

    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'id_usuario', 'id_usuario');
    }

    public function producto()
   	{
   		return $this->belongsToMany('App\Producto', 'detalles', 'id_factura', 'id_producto')
        ->withPivot('precio_detalle', 'created_at', 'updated_at');
   	}

}
