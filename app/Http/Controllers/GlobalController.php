<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GlobalController extends Controller
{
    public function accueil(){
        return view('accueil');
    }
    public function choix_trajet()
    {
        return view('choix_trajet');
    }
    public function register2()
    {
        return view('register2.register2');
    }
    public function connexion()
    {
        return view('register.login');
    }
    // Attente de l'authentification utilisateur
    public function reservation()
    {
        return view('choix_trajet');
    }
}
