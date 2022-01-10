<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->String('rfc');
            $table->String('nombre');
            $table->String('apaterno');
            $table->String('amaterno');
            $table->String('correo');
            $table->String('telefono');
            $table->String('direccion');
            $table->String('edad');
            $table->String('foto');
            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id')
                     ->references('id')
                     ->on('departamentos')
                     ->onDelete('restrict')
                     ->onUpdate('cascade');
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
        Schema::dropIfExists('docentes');
    }
}
