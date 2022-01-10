<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DocenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rfc'=>$this->faker->buildingNumber(),
            'nombre'=>$this->faker->name(),
            'apaterno'=>$this->faker->lastName(),
            'amaterno'=>$this->faker->lastName(),
            'correo'=>$this->faker->unique()->safeEmail(),
            'telefono'=>$this->faker->tollFreePhoneNumber(),
            'direccion'=>$this->faker->streetAddress(),
            'edad'=>$this->faker->randomDigit(),
            'foto'=>$this->faker->image($dir='/Noveno/Residencia/img',$width=640, $height=480),
            'departamento_id'=>$this->faker->randomDigitNot(0),
        ];
    }
}
