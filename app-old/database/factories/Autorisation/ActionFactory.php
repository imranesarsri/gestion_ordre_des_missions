<?php

namespace Database\Factories\Autorisation;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Autorisation\Controller>
 */
class ActionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->text(7),
            'controller_id' => fake()->randomDigitNotNull()
      
        ];
    }
}
