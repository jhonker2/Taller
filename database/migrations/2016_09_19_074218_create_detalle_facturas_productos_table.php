<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleFacturasProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_facturas_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->integer('idProducto')->unsigned();
            $table->integer('idFactura')->unsigned();
            $table->decimal('precioUnitario');
            $table->decimal('subtotal');
            $table->foreign('idProducto')->references('id')->on('productos');
            $table->foreign('idFactura')->references('id')->on('factura_ventas');
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
        Schema::drop('detalle_facturas_productos');
    }
}
