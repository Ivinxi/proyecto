<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre_producto', 30);
            $table->string('descripcion', 500);
            $table->decimal('precio', 6, 2);
            $table->integer('oferta_porcentaje');
            $table->integer('oferta_plana');
            $table->string('marca', 20);
            $table->string('temporada', 10);
            $table->string('target', 10);
            $table->string('material', 20);
            $table->string('foto_producto', 255);
            $table->boolean('habilitado');
            $table->string('categoria', 20);
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
        Schema::dropIfExists('productos');
    }
}
