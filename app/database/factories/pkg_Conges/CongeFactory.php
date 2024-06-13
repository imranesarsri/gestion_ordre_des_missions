<?php

namespace Database\Factories\pkg_Conges;

use App\Models\pkg_Parametres\Motif;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GestionConges\Conge>
 */
class CongeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_debut' => fake()->date(),
            'date_fin' => fake()->date(),
            'motif_id' => Motif::factory()->create()->id,
        ];
    }
}
