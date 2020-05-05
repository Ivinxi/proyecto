<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->foreignId('id_producto')->references('id_producto')->on('productos');
            $table->foreignId('id_talla')->references('id_talla')->on('tallas');
            $table->foreignId('id_color')->references('id_color')->on('colors');
            $table->integer('cantidad_stock');
            $table->timestamps();


            $table->primary(['id_producto','id_talla','id_color']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
