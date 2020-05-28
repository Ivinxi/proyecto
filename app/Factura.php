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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario', 'precio_factura', 'metodo_pago', 'pdf_factura',
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'id_usuario', 'id_usuario');
    }

    public function stock()
   	{
   		return $this->belongsToMany('App\Stock', 'detalles', 'id_factura', 'id_stock')
        ->withPivot('cantidad_detalle', 'precio_detalle', 'created_at', 'updated_at');
   	}

}
