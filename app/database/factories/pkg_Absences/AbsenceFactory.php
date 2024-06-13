<?php

namespace Database\Factories\pkg_Absences;

use App\Models\User;
use App\Models\pkg_Absences\Absence;
use App\Models\pkg_Parametres\Motif;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Absence>
 */
class AbsenceFactory extends Factory
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
            'remarques' => $this->faker->text(),
            'user_id' => User::factory(),
            'motif_id' => Motif::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
