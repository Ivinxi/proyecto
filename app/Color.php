<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $table = 'colors';

    protected $primaryKey = 'id_color';

    public function stock()
   	{
   		return $this->hasMany('App\Stock', 'id_color', 'id_color');
   	}

}
