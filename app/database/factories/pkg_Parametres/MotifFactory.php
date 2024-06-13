<?php

namespace Database\Factories\pkg_Parametres;

use Illuminate\Database\Eloquent\Factories\Factory;


class MotifFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->name(),
            'description' => fake()->text(10),
        ];
    }
}