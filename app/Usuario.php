<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $table = 'usuarios';

    protected $primaryKey = 'id_usuario';


    public function factura()
   	{
   		return $this->hasMany('App\Factura', 'id_usuario', 'id_usuario');
   	}

}
