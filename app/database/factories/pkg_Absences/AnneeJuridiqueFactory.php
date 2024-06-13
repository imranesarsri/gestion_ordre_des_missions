<?php

namespace Database\Factories\pkg_Absences;

use App\Models\pkg_Absences\AnneeJuridique;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<AnneeJuridique>
 */
class AnneeJuridiqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startYear = $this->faker->year;
        $endYear = $startYear + 1;

        return [
            'annee' => "{$startYear}-{$endYear}",
            'remarques' => $this->faker->optional()->text,
        ];
    }
}
