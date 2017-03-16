<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleMaterialProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_material_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idMaterial')->unsigned();
            $table->integer('idSolicitud')->unsigned();
            $table->integer('cantidad');
            $table->string('unidadMedida');
            $table->foreign('idMaterial')->references('id')->on('materia_primas');
            $table->foreign('idSolicitud')->references('id')->on('solicitud_pedidos');
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
        Schema::drop('detalle_material_productos');
    }
}
