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

        Type_voitures::create([
            'type' => 'Berline',
            'description_voiture' => 'Voiture classique avec un coffre séparé et un bon confort.',
            'usage_passager' => 'Parfait pour le confort et les bagages moyens.',
            // nbr de passager maximum
            'nbr_passager' => '5',
            'bagage' => '2',
        ]);

        Type_voitures::create([
            'type' => 'SUV / 4x4',
            'description_voiture' => 'Véhicule haut, robuste et spacieux',
            'usage_passager' => 'Idéal pour les routes difficiles ou beaucoup de bagages',
            // nbr de passager maximum
            'nbr_passager' => '5',
            'bagage' => '3',
        ]);

        Type_voitures::create([
            'type' => 'Van',
            'description_voiture' => 'Grand véhicule spacieux avec 7 places assises.',
            'usage_passager' => 'Le meilleur choix pour les groupes ou familles nombreuses.',
            // nbr de passager maximum
            'nbr_passager' => '7',
            'bagage' => '2',
        ]);

        LocalisationChauffeur::factory(50)->create();
    }
}
