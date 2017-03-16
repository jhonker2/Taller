<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechaPedido');
            $table->date('fechaEntrega');
            $table->string('elaboradoPor');
            $table->string('encargadoBodega');
            $table->string('estado');
            $table->integer('idEmpleado')->unsigned();
            $table->foreign('idEmpleado')->references('id')->on('empleados');
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
        Schema::drop('solicitud_pedidos');
    }
}
