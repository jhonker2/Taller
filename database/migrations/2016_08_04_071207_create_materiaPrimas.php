<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriaPrimas extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_primas', function (Blueprint $table){
            $table->increments('id');
            $table->string('material');
            $table->decimal('precio');
            $table->string('cantidad');
            $table->string('cantidad_medida');
            $table->string('unidadMedida');
            $table->integer('stock');
            $table->string('descripcion');
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
        Schema::drop('materia_primas');
    }
}
