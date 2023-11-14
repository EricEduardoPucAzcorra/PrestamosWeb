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
        Schema::create('documento', function (Blueprint $table) {
            $table->increments("id_documento");
            $table->integer('id_tipo_documento')->unsigned();
            $table->foreign('id_tipo_documento')->references('id_tipo_documento')->on('tipo_documento');
            $table->string("url_document", 250);
            $table->string("direccion_guardado", 250);
            $table->float("tamano_float");
            $table->string("tamano_string")->nullable();
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id_persona')->on('persona');
            $table->integer('id_aval')->unsigned();
            $table->foreign('id_aval')->references('id_persona')->on('persona');
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
        Schema::dropIfExists('documento');
    }
};
