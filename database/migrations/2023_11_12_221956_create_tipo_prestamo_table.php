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
        Schema::create('tipo_prestamo', function (Blueprint $table) {
            $table->increments("id_tipo_prestamo");
            $table->string("nombre", 150);
            $table->string("descripcion", 200)->nullable();
            $table->float("monto");
            $table->string("plazo", 100);
            $table->string("observaciones", 250)->nullable();
            $table->enum("tiene_garantia", ["SI","NO"]);
            $table->integer('id_categoria_prestamo')->unsigned();
            $table->foreign('id_categoria_prestamo')->references('id_categoria_prestamo')->on('categoria_prestamo');
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
        Schema::dropIfExists('tipo_prestamo');
    }
};
