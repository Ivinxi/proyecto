<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('email', 50);
            $table->string('password', 50);
            $table->integer('rol');
            $table->string('nombre_usuario', 20);
            $table->string('apellidos', 50);
            $table->integer('telefono');
            $table->string('direccion1', 50);
            $table->string('direccion2', 50);
            $table->string('provincia', 20);
            $table->string('localidad', 20);
            $table->integer('codigo_postal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
