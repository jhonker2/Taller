<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleFacturaMateriaPrimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_factura_materia_primas', function (Blueprint $table) {
           $table->increments('id');
             $table->integer('cantidad');
             $table->integer('idMaterial')->unsigned();
             $table->double('precioUnitario');
             $table->double('subtotal');
             $table->integer('idFactura')->unsigned();
            $table->foreign('idMaterial')->references('id')->on('materia_primas');
            $table->foreign('idFactura')->references('id')->on('factura_compras');
            $table->timestamps();
            });
    }
    /**    * @return void
     */
    public function down()
    {
        Schema::drop('detalle_factura_materia_primas');
    }
}
