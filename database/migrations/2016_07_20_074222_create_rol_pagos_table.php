<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula');
            $table->string('mes');
            $table->decimal('sueldo');
            $table->integer('horasExtras');
            $table->decimal('comisiones');
            $table->decimal('aportesIees');
            $table->decimal('totalDescuento');
            $table->decimal('totalSueldo');
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
        Schema::drop('rol_pagos');
    }
}
