<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Stock extends Model
{
    use SoftDeletes;
    //
    protected $table = 'stocks';

    protected $primaryKey = 'id';

    // protected $primaryKey = ['id_producto', 'id_talla', 'id_color'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','id_producto', 'id_talla', 'id_color', 'cantidad_stock',
    ];


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

 public function factura()
    {
      return $this->belongsToMany('App\Factura', 'detalles', 'id', 'id_factura')
        ->withPivot('cantidad_detalle', 'precio_detalle', 'created_at', 'updated_at');
    }


}
