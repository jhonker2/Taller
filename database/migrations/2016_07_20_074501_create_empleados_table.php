<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula');
            $table->string('cargo');
            $table->string('fechaContratacion');
            $table->string('salario');
            $table->string('estatus');
            $table->string('cargaFamiliar');
            $table->string('foto');
            $table->foreign('cedula')->references('cedula')->on('personas');
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
        Schema::drop('empleados');
    }
}
