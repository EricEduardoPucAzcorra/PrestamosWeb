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
        Schema::create('aval_cliente', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id_persona')->on('persona');
            $table->integer('id_aval')->unsigned();
            $table->foreign('id_aval')->references('id_persona')->on('persona');
            $table->string("detalles", 250)->nullable();
            $table->enum("esfamiliar", ["SI","NO"])->nullable();
            $table->enum("esconocido", ["SI", "NO"])->nullable();
            $table->integer("año_conocerse")->nullable();
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
        Schema::dropIfExists('aval_cliente');
    }
};
