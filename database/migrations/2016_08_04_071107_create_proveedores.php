<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreEmpresa');
            $table->string('ruc');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correo')->unique();
            $table->string('representante');
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
        Schema::drop('proveedores');
    }
}
