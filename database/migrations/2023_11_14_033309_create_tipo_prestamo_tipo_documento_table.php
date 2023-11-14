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
        Schema::create('tipo_prestamo_tipo_documento', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tipo_prestamo')->unsigned();
            $table->foreign('id_tipo_prestamo')->references('id_tipo_prestamo')->on('tipo_prestamo');

            $table->integer('id_categoria_prestamo')->unsigned();
            $table->foreign('id_categoria_prestamo')->references('id_categoria_prestamo')->on('categoria_prestamo');

            $table->integer('id_tipo_documento')->unsigned();
            $table->foreign('id_tipo_documento')->references('id_tipo_documento')->on('tipo_documento');

            $table->enum("activo", [1,0]);
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
        Schema::dropIfExists('tipo_prestamo_tipo_documento');
    }
};
