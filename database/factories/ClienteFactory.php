<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nombre' => $this->faker->firstName(),
            'Apellido' => $this->faker->lastName(),
            'Localidad' => $this->faker->city(),
            'Fecha_de_Nacimiento' => $this->faker->date(),
            'Trabajo' => $this->faker->jobTitle(),
            'Telefono' => $this->faker->phoneNumber(),
            'Foto' => $this->faker->imageUrl('http://lorempixel.com/400/200'), 
        ];
    }
}
