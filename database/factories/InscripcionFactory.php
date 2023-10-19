<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InscripcionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            //'hora'=>$this->faker->time($format = 'H:i:s', $max = 'now'),
            'evento_id'=>$this->faker->randomDigitNot(0),
            'docente_id'=>$this->faker->randomDigitNot(0),
            'curso_id'=>$this->faker->randomDigitNot(0),
            'estudiante_id'=>$this->faker->randomDigitNot(0),
            'publico_id'=>$this->faker->randomDigitNot(0),
        ];
    }
}
