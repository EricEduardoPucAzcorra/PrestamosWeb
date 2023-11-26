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
        Schema::create('permiso', function (Blueprint $table) {
            $table->increments('id_permiso');
            $table->string('nombre', 150);
            $table->string('descripcion', 200);
            $table->string('siglas', 150);
            $table->integer('id_modulo')->unsigned();
            $table->foreign('id_modulo')->references('id_modulo')->on('modulo');
            // $table->integer('id_aval')->unsigned();
            // $table->foreign('id_aval')->references('id_persona')->on('persona');
            $table->enum('activo', ['ACTIVO','NO ACTIVO']);
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
        Schema::dropIfExists('permiso');
    }
};
