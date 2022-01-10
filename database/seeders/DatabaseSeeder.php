<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();
         \App\Models\Publico::factory(15)->create();
         \App\Models\Departamento::factory(15)->create();
         \App\Models\Ponente::factory(15)->create();
         \App\Models\Instructor::factory(15)->create();
         \App\Models\Evento::factory(15)->create();
         \App\Models\Curso::factory(15)->create();
         \App\Models\Carrera::factory(15)->create();
         \App\Models\Estudiante::factory(15)->create();
         \App\Models\Docente::factory(15)->create();
         \App\Models\Conferencia::factory(15)->create();
         \App\Models\Inscripcion::factory(15)->create();

    }
}
