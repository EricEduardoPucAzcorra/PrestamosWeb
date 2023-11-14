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
        Schema::create('garantia', function (Blueprint $table) {
            $table->increments("id_garantia");
            $table->integer('id_prestamo')->unsigned();
            $table->foreign('id_prestamo')->references('id_prestamo')->on('prestamo');
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id_persona')->on('persona');
            $table->integer('id_tipo_prestamo')->unsigned();
            $table->foreign('id_tipo_prestamo')->references('id_tipo_prestamo')->on('tipo_prestamo');
            $table->integer('id_tipo_garantia')->unsigned();
            $table->foreign('id_tipo_garantia')->references('id_tipo_garantia')->on('tipo_garantia');
            $table->enum("percibido_buen_estado", ["SI","NO"])->nullable();
            $table->string("color", 250)->nullable();
            $table->string("marca", 100)->nullable();
            $table->string("modelo", 100)->nullable();
            $table->string("tamano", 100)->nullable();
            $table->integer("anios_uso");
            $table->string("observaciones", 250)->nullable();
            $table->string("sistema")->nullable();
            $table->string("folio")->nullable();
            $table->integer("num_identificacion");
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
        Schema::dropIfExists('garantia');
    }
};
