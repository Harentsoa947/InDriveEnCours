<?php

namespace Database\Factories;

use App\Models\LocalisationChauffeur;
use App\Models\Type_voitures;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
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
        // return [
        //     'name' => fake()->name(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'email_verified_at' => now(),
        //     'password' => static::$password ??= Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ];
        return [
            'name' => fake()->name(),
            'numero_phone' => fake()->phoneNumber(),
            'role' => 'Chauffeur',
            'marque_voiture' => fake()->company(),
            'electrique' => fake()->boolean(),
            'password' => bcrypt('1234'),
            'position_chauffeur_id' => LocalisationChauffeur::inRandomOrder()->value('id'),
            'type_voitures_id' => Type_voitures::inRandomOrder()->value('id')
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
