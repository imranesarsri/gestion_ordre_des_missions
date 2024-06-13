<?php

namespace Database\Factories\pkg_Parametres;

use Illuminate\Database\Eloquent\Factories\Factory;

class GardeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->text(7),
            'echell_debut' => $this->faker->date(),
            'echell_fin' => $this->faker->date(),
        ];
    }
}