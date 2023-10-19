<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesPonentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes_ponentes', function (Blueprint $table) {
            $table->id();
            $table->String('titulo');
            $table->String('descripcion');
            $table->String('modalidad');
            $table->String('fecha');
            $table->String('hora');
            $table->unsignedBigInteger('ponente_id');
            $table->foreign('ponente_id')
                    ->references('id')
                    ->on('ponentes')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->unsignedBigInteger('docente_id');
            $table->foreign('docente_id')
                    ->references('id')
                    ->on('docentes')
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
        Schema::dropIfExists('docentes_ponentes');
    }
}
