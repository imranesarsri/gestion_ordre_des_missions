<?php

namespace Database\Factories\pkg_PriseDeServices;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\pkg_Parametres\Ville;
use App\Models\pkg_Parametres\Fonction;
use App\Models\pkg_Parametres\Specialite;
use App\Models\pkg_Parametres\Etablissement;
use App\Models\pkg_Parametres\Avancement;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pkg_PriseDeServices\Personnel>
 */
class PersonnelFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $phoneNumber = '06' . $this->faker->numerify('########');
        return [
            'nom' => $this->faker->firstName(),
            'prenom' => $this->faker->lastName(),
            'nom_arab' => $this->faker->firstName(),
            'prenom_arab' => $this->faker->lastName(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'cin' => $this->faker->unique()->randomNumber(8),
            'date_naissance' => $this->faker->date(),
            'telephone' => $phoneNumber,
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'images' => $this->faker->imageUrl(),
            'matricule' => $this->faker->unique()->randomNumber(6),
            'ville_id' => Ville::factory()->create()->id,
            'fonction_id' => Fonction::factory()->create()->id,
            'ETPAffectation_id' => Etablissement::factory()->create()->id,
            'specialite_id' => Specialite::factory()->create()->id,
            'etablissement_id' => Etablissement::factory()->create()->id,
            'avancement_id' => Avancement::factory()->create()->id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
