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
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments("id_cliente");
            $table->string("nombre", 150);
            $table->string("apellido_p", 150);
            $table->string("apellido_m", 150);
            $table->string("rfc", 13)->nullable();
            $table->string("domicilio", 200);
            $table->string("telefono", 10)->nullable();
            $table->string("ceular", 10);
            $table->string("referencia", 200);
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
        Schema::dropIfExists('cliente');
    }
};
