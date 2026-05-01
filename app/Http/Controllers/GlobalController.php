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
    public function register()
    {
        return view('register.register');
    }
}
