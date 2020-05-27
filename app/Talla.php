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

    public static function numeros()
    {
        $tallas = Talla::all();
        $numeros = [];

        foreach ($tallas as $talla) {
            if (is_numeric($talla->nombre_talla)) {
                array_push($numeros, $talla);
            }
        }

        return $numeros;
    }

    public static function letras()
    {
        $tallas = Talla::all();
        $letras = [];

        foreach ($tallas as $talla) {
            if (!is_numeric($talla->nombre_talla)) {
                array_push($letras, $talla);
            }
        }

        return $letras;
    }
}
