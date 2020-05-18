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
            $table->string('password', 255);
            $table->enum('rol', ['usuario','admin'])->default('usuario');
            $table->string('nombre_usuario', 20);
            $table->string('apellidos', 50)->nullable();
            $table->integer('telefono')->nullable();
            $table->string('direccion1', 50)->nullable();
            $table->string('direccion2', 50)->nullable();
            $table->string('provincia', 20)->nullable();
            $table->string('localidad', 20)->nullable();
            $table->integer('codigo_postal')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
