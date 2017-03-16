<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->string('cedula');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('nombre');
            $table->string('sexo');
            $table->string('estadoCivil');
            $table->string('direccion');
            $table->string('fechaNacimiento');
            $table->string('correo');
            $table->string('telefono');
            $table->timestamps();
            $table->primary('cedula');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personas');
    }
}
