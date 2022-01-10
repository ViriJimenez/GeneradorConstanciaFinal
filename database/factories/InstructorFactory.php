<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InstructorFactory extends Factory
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
            'apaterno'=>$this->faker->lastName(),
            'amaterno'=>$this->faker->lastName(),
            'correo'=>$this->faker->unique()->safeEmail(),
            'telefono'=>$this->faker->tollFreePhoneNumber(),
            'titulo'=>$this->faker->titleMale(),
        ];
    }
}
