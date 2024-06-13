<?php

namespace Database\Factories\pkg_Parametres;

use Illuminate\Database\Eloquent\Factories\Factory;

class AvancementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_debut' => $this->faker->date(),
            'date_fin' => $this->faker->date(),
            'echell' => $this->faker->unique()->randomNumber(8),
        ];
    }
}