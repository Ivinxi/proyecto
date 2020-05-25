<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('id_factura');
            $table->foreignId('id_usuario')->references('id_usuario')->on('usuarios');
            $table->decimal('precio_factura', 8, 2);
            $table->enum('estado', ['pendiente','enviado','entregado'])->default('pendiente');
            $table->enum('metodo_pago', ['tarjeta', 'paypal', 'contrareembolso']);
            $table->string('pdf_factura', 255);
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
        Schema::dropIfExists('facturas');
    }
}
