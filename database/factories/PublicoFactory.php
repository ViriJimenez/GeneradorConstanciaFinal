<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PublicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'curp'=>$this->faker->swiftBicNumber(),
            'nombre'=>$this->faker->name(),
            'apaterno'=>$this->faker->lastName(),
            'amaterno'=>$this->faker->lastName(),
            'correo'=>$this->faker->unique()->safeEmail(),
            'telefono'=>$this->faker->tollFreePhoneNumber(),
            'direccion'=>$this->faker->streetAddress(),
            'edad'=>$this->faker->randomDigit(),
        ];
    }
}
