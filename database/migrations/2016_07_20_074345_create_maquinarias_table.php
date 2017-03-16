<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaquinariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquinarias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maquina');
            $table->string('marca');
            $table->string('modelo');
            $table->string('stock');
            $table->string('precio');
            $table->string('fechaIngreso');
            $table->string('fechaDeterioro');
            $table->string('idEmpleado');
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
        Schema::drop('maquinarias');
    }
}
