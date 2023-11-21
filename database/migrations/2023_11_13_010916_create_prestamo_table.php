<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamo', function (Blueprint $table) {
            $table->increments("id_prestamo");
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id_persona')->on('persona');
            $table->integer('id_tipo_prestamo')->unsigned();
            $table->foreign('id_tipo_prestamo')->references('id_tipo_prestamo')->on('tipo_prestamo');
            $table->integer('id_categoria_prestamo')->unsigned();
            $table->foreign('id_categoria_prestamo')->references('id_categoria_prestamo')->on('categoria_prestamo');
            $table->float("monto");
            $table->float("interes");
            $table->integer("plazo");
            $table->string("plazo_text")->nullable();
            $table->date("fecha_inicio");
            $table->date("fecha_final");
            $table->date("fecha_pago");
            $table->integer("total_pagos")->nullable();
            $table->string("plazo_pago")->nullable();
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
        Schema::dropIfExists('prestamo');
    }
};
