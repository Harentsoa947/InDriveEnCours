<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LocalisationChauffeur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CityController extends Controller
{
    public function recherche_ville(Request $req)
    {
        
        $ville = $req->query('q');
        $bbox = "46.6,-19.5,48.5,-17.5";

        // Ajoute "withoutVerifying()" juste avant le "get()"
        $response = Http::withoutVerifying()->get('https://photon.komoot.io/api/', [
            'q' => $ville,
            'bbox' => $bbox,
            'limit' => 10
        ]);

        if($response->successful()){
            return response()->json($response->json());
        }
        return response()->json(['error' => 'Erreur API'], 500);
    }

    public function point_chauffeur()
    {
        // $chauffeurs = LocalisationChauffeur::all();
        $chauffeurs = User::where('role', 'Chauffeur')
                        ->with(['localChauf', 'typeVoiture'])
                        ->get();
        // dd(response()->json($chauffeurs));
        return response()->json($chauffeurs);
    }

}
