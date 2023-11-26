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
        Schema::create('user_permiso', function (Blueprint $table) {
            $table->increments('id_usPermiso');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id_usuario')->on('users');
            $table->integer('id_permiso')->unsigned();
            $table->foreign('id_permiso')->references('id_permiso')->on('permiso');
            $table->integer('id_modulo')->unsigned();
            $table->foreign('id_modulo')->references('id_modulo')->on('modulo');
            $table->datetime("fecha_asignacion");
            $table->integer("id_usuario_registro")->nullable();
            $table->integer('id_usuario_actualizacion')->nullable();
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
        Schema::dropIfExists('user_permiso');
    }
};
