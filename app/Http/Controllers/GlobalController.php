<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RequetTrip;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GlobalController extends Controller
{
    public function accueil(){
        $requete = null;
        if(Auth::check() && auth()->user()->role == 'Chauffeur'){
            $requete = RequetTrip::where('chauffeur_id', auth()->user()->id)->count();
            return view('accueil', ['requete' => $requete]);
        }
        return view('accueil', ['requete' => $requete]);
    }
    public function choix_trajet()
    {
        return view('choix_trajet');
    }
    // Attente de l'authentification utilisateur
    // public function reservation()
    // {
    //     return view('choix_trajet');
    // }
    public function afficher_trajet($id = null)
    {
        if($id){
            $trip = Trip::findOrFail($id);
            $requete = RequetTrip::where('chauffeur_id', auth()->user()->id)->count();
            return view('affiche_trajet', ['trip' => $trip, 'id' =>$id, 'requete' => $requete]);
        }
        $trips = Trip::with('user')->get();
        $requete = RequetTrip::where('chauffeur_id', auth()->user()->id)->count();
        return view('affiche_trajet', ['trips' => $trips, 'id'=> $id, 'requete' => $requete]);
    }
    public function new_trajet(Request $req)
    {
        $req->validate([
            'kilometre' => 'required',
            'depart' => 'required',
            'destination' => 'required',
            'latDep' => 'required',
            'lonDep' => 'required'
        ], [
            'kilometre.required' => 'Vous avez entrée des donner invalide',
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
        $new_tr->latDep = $req->input('latDep');
        $new_tr->lonDep = $req->input('lonDep');
        // prix (en cours)
        $new_tr->prix = '1000';
        $new_tr->save();


        

        return redirect()->route('confirmation', 'success');
        // return redirect()->route('accueil')->with('etat', 'En attente d\'une chauffeur');

    }

    public function confirmation($validation = null)
    {
        if($validation == null){
            return redirect()->route('accueil');
        }
        $reservation = Trip::where('user_id', auth()->id())
            ->latest()
            ->first();

        $chauffeur = User::where('role', 'Chauffeur')
            ->with(['localChauf', 'typeVoiture'])
            ->get();

        // dd($reservation->latDep);
        
        foreach($chauffeur as $c){
            if($reservation && $c->localChauf){
                $c->distance = $this->calculDistance(
                    $reservation->latDep, 
                    $reservation->lonDep, 
                    $c->localChauf->latChauf, 
                    $c->localChauf->lonChauf
                );
            }
        }


        return view('confirmation_trajet', [
            'reservation' => $reservation,
            'chauffeur' => $chauffeur
        ]);
    }

    public function calculDistance($lat1, $lon1, $lat2, $lon2)
    {
        $R = 6371; // Rayon de la Terre en km

        $dLat = ($lat2 - $lat1) * pi() / 180;
        $dLon = ($lon2 - $lon1) * pi() / 180;

        $a = sin($dLat / 2) ** 2 +
            cos($lat1 * pi() / 180) *
            cos($lat2 * pi() / 180) *
            sin($dLon / 2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        
        $distance = $R * $c;

        return round($distance, 2); // Équivalent de toFixed(2)
    }


    public function envoyeDemande(Request $req)
    {
        // dd($req);
        $req->validate([
            'dep' => 'required',
            'des' => 'required',
            'disTrajet' => 'required',
            'prixProposer' => 'required',
            'chauffeur' => 'required',
            'Chauf_Passager' => 'required',
            'idTrip' => 'required'
        ], [
            'chauffeur.required' => 'Vous devez choisir une ou des chauffeurs'
        ]);
        // dd(auth()->id());
        // dd($req->chauffeur);
        foreach($req->chauffeur as $id){
            $demande = new RequetTrip();
            $demande->passager_id = Auth::user()->id;
            $demande->chauffeur_id = $id;
            $demande->depart = $req->input('dep');
            $demande->destination = $req->input('des');
            $demande->disTrajet = $req->input('disTrajet');
            $demande->prixProposer = $req->input('prixProposer');
            $demande->Chauf_Pass_Dis = $req->input('Chauf_Passager');
            $demande->trip_id = $req->input('idTrip');
            $demande->save();
        }
        
        return redirect()->route('accueil');
    }

    public function chauffeur($id)
    {
        // with : relation, besoin d'un méthode dans le modèle user
        $chauffeur = User::with(['typeVoiture', 'localChauf'])->find($id);
        // Utilisation : {{ $chauffeur->typeVoiture->nom }}
        return view('chauffeur', ['chauffeur' => $chauffeur]);
    }

    public function trajet()
    {
        return view('trajet');
    }

}