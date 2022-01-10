<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicos', function (Blueprint $table) {
            $table->id();
            $table->String('curp');
            $table->String('nombre');
            $table->String('apaterno');
            $table->String('amaterno');
            $table->String('correo');
            $table->String('telefono');
            $table->String('direccion');
            $table->String('edad');
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
        Schema::dropIfExists('publicos');
    }
}
