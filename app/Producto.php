<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
    //
    protected $table = 'productos';

    protected $primaryKey = 'id_producto';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_producto', 'descripcion', 'precio', 'oferta_porcentaje', 'oferta_plana', 'marca', 'temporada', 'target', 'material', 'foto_producto', 'categoria',
    ];


    public function stock()
   	{
   		return $this->hasMany('App\Stock', 'id_producto', 'id_producto');
   	}

    public function factura()
    {
      return $this->belongsToMany('App\Factura', 'detalles', 'id_producto', 'id_factura')
        ->withPivot('precio_detalle', 'created_at', 'updated_at');
    }

    public function oferta()
    {
      $oferta = '';

      if(!empty($this->oferta_porcentaje))
        $oferta = $this->oferta_porcentaje . '%';
      elseif(!empty($this->oferta_plana))
        $oferta = $this->oferta_plana . '€';
      else
        $oferta = $this->oferta_plana;

      return $oferta;
    }

    public function foto()
    {
      if(empty($this->foto_producto))
        return 'No';
      else
        return 'Sí';
    }
}
