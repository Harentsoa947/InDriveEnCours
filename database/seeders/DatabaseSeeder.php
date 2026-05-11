<?php

namespace Database\Seeders;

use App\Models\LocalisationChauffeur;
use App\Models\Type_voitures;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // bagage : 1(Petit), 2 (Moyen), 3(Beaucoup)
        // orm eloquent
        Type_voitures::create([
            'type' => 'Compacte',
            'description_voiture' => 'Petite voiture de ville, agile et facile à garer.',
            'usage_passager' => 'Idéal pour trajets courts et budget serré.',
            // nbr de passager maximum
            'nbr_passager' => '4',
            'bagage' => '1',
        ]);

        LocalisationChauffeur::factory(50)->create();
    }
}
