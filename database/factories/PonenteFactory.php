<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PonenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->name(),
            'clave'=>$this->faker->swiftBicNumber(),
            'correo'=>$this->faker->unique()->safeEmail(),
        ];
    }
}
