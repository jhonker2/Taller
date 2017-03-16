<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleServicios extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->integer('idServicio')->unsigned();
            $table->integer('idTipoFactura')->unsigned();
            $table->decimal('precioUnitario');
            $table->decimal('subtotal');
            $table->integer('tipoEmpleado');
            $table->foreign('idServicio')->references('id')->on('servicios');
            $table->foreign('idTipoFactura')->references('id')->on('tipoFacturas');
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
        Schema::drop('detalle_servicios');
    }
}
