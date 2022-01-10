<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcions', function (Blueprint $table) {
            $table->id();
            $table->String('fecha');
            $table->String('hora');
            $table->unsignedBigInteger('evento_id');
            $table->foreign('evento_id')
                    ->references('id')
                    ->on('eventos')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->unsignedBigInteger('conferencia_id');
            $table->foreign('conferencia_id')
                    ->references('id')
                    ->on('conferencias')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')
                    ->references('id')
                    ->on('cursos')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->unsignedBigInteger('estudiante_id');
            $table->foreign('estudiante_id')
                    ->references('id')
                    ->on('estudiantes')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->unsignedBigInteger('publico_id');
            $table->foreign('publico_id')
                    ->references('id')
                    ->on('publicos')
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
        Schema::dropIfExists('inscripcions');
    }
}
