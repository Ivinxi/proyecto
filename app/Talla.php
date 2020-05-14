<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    //
    protected $table = 'tallas';

    protected $primaryKey = 'id_talla';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_talla'
    ];


    public function stock()
   	{
   		return $this->hasMany('App\Stock', 'id_talla', 'id_talla');
   	}
}
