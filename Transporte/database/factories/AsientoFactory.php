<?php

namespace Database\Factories;

use App\Models\Asiento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Asiento>
 */
class AsientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'salida' => fake()->city(),
            'NumA' => fake()->randomElement(80, 75),
            'CI_P' => Str::random(6),
        ];
    }
}
