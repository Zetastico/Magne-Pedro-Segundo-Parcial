<?php

namespace Database\Factories;

use App\Models\Salida;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Salida>
 */
class SalidaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'destino' => fake()->city(),
            'fecha' => fake()->randomElement('20/11/2005', '23/12/2000'),
            'hora' => fake()->randomElement('16:00', '18:00'), 
            'bus' => fake()->word(),
            'precio' => fake()->randomElement(20.5, 15.5),
            'capacidad' => fake()->randomElement(80, 75),
        ];
    }
}
