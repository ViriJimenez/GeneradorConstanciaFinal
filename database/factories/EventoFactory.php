<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->streetAddress(),
            'tipo'=>$this->faker->text(),
            'descripcion'=>$this->faker->text(),
        ];
    }
}
