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
        Schema::create('tipo_garantia', function (Blueprint $table) {
            $table->increments("id_tipo_garantia");
            $table->string("garantia");
            $table->string("decripcion")->nullable();
            $table->string("objeto");
            $table->string("caracteristicas")->nullable();
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
        Schema::dropIfExists('tipo_garantia');
    }
};
