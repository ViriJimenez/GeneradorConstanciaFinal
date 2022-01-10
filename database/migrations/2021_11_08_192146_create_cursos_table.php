<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->String('titulo');
            $table->String('descripcion');
            $table->String('modalidad');
            $table->String('fecha');
            $table->String('hora');
            $table->unsignedBigInteger('instructor_id');
            $table->foreign('instructor_id')
                     ->references('id')
                     ->on('instructors')
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
        Schema::dropIfExists('cursos');
    }
}
