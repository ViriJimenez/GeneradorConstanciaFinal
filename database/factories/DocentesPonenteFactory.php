<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DocentesPonenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo'=>$this->faker->lastname(),
            'descripcion'=>$this->faker->text(),
            'modalidad'=>$this->faker->name(),
            'fecha'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'hora'=>$this->faker->time($format = 'H:i:s', $max = 'now'),
            'ponente_id'=>$this->faker->randomDigitNot(0),
            'docente_id'=>$this->faker->randomDigitNot(0),
        ];
    }
}
