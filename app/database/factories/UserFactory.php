<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prenom' => $this->faker->firstName(),
            'nom' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'nom_arab' => $this->faker->optional()->word(),
            'prenom_arab' => $this->faker->optional()->word(),
            'cin' => $this->faker->optional()->numerify('########'),
            'date_naissance' => $this->faker->optional()->date(),
            'telephone' => $this->faker->optional()->phoneNumber(),
            'address' => $this->faker->optional()->address(),
            'images' => $this->faker->optional()->imageUrl(),
            'matricule' => $this->faker->optional()->numerify('####'),
            'ville_id' => $this->faker->optional()->numberBetween(1, 100),
            'fonction_id' => $this->faker->optional()->numberBetween(1, 100),
            'ETPAffectation_id' => $this->faker->optional()->numberBetween(1, 100),
            'grade_id' => $this->faker->optional()->numberBetween(1, 100),
            'specialite_id' => $this->faker->optional()->numberBetween(1, 100),
            'etablissement_id' => $this->faker->optional()->numberBetween(1, 100),
            'avancement_id' => $this->faker->optional()->numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
