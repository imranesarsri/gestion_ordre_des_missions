<?php

namespace Database\Factories\pkg_Parametres;

use Illuminate\Database\Eloquent\Factories\Factory;

class EtablissementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->text(6),
            'description' => $this->faker->text(22),
        ];
    }
}