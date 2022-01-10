<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo'=>$this->faker->streetAddress(),
            'descripcion'=>$this->faker->text(),
            'modalidad'=>$this->faker->name(),
            'fecha'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'hora'=>$this->faker->time($format = 'H:i:s', $max = 'now'),
            'instructor_id'=>$this->faker->randomDigitNot(0),
        ];
    }
}
