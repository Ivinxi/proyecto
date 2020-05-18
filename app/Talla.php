<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Talla extends Model
{
    use SoftDeletes;
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
