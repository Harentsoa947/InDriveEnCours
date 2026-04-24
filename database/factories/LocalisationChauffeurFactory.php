<?php

namespace Database\Factories;

use App\Models\LocalisationChauffeur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LocalisationChauffeur>
 */
class LocalisationChauffeurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomChauf' => $this->faker->name(),
            'latChauf' => $this->faker->latitude(-19.0, -18.7),
            'lonChauf' => $this->faker->longitude(47.3, 47.7)
        ];
    }
}
