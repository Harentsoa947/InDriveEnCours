<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GlobalController extends Controller
{
    public function accueil(){
        return view('accueil');
    }
    public function choix_trajet()
    {
        return view('choix_trajet');
    }
    // Attente de l'authentification utilisateur
    public function reservation()
    {
        return view('choix_trajet');
    }
    public function afficher_trajet()
    {
        $trip = Trip::with('user')->get();
        return view('affiche_trajet', compact('trip'));
    }
    public function new_trajet(Request $req)
    {
        $req->validate([
            // 'kilometre' => 'required',
            'depart' => 'required',
            'destination' => 'required'
        ], [
            // 'kilometre.required' => 'Il y a un problème lors du calcul du longueur de chemin',
            'depart.required' => "Vous devez avoir une point de départ",
            'destination.required' => 'Veuillez remplir le point de déstination'
        ]);

        // driver_id : attent qu'un chauffeur accepte
        // prix : en cours, par rapport à kilometre
        $new_tr = new Trip();
        $new_tr->user_id = Auth::user()->id;
        $new_tr->depart = $req->input('depart');
        $new_tr->destination = $req->input('destination');
        $new_tr->kilometre = $req->input('kilometre');
        // prix (en cours)
        $new_tr->prix = '1000';
        $new_tr->save();
        return redirect()->route('accueil')->with('etat', 'En attente d\'une chauffeur');
    }
}
