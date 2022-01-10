<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('numerocontrol');
            $table->String('nombre');
            $table->String('apaterno');
            $table->String('amaterno');
            $table->String('correo');
            $table->String('telefono');
            $table->String('direccion');
            $table->String('edad');
            $table->unsignedBigInteger('carrera_id');
            $table->foreign('carrera_id')
                     ->references('id')
                     ->on('carreras')
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
        Schema::dropIfExists('estudiantes');
    }
}
