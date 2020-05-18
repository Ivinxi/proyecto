<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Factura extends Model
{
    use SoftDeletes;
  
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
