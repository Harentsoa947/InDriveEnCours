<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\GlobalController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Appelle API Laravel + JavaScript
Route::get('/villes/recherche', [CityController::class, 'recherche_ville']);
Route::get('/point/chauffeur', [CityController::class, 'point_chauffeur']);

Route::get('/', [GlobalController::class, 'accueil'])->name('accueil');
Route::get('choix_trajet', [GlobalController::class, 'choix_trajet'])->name('choix_trajet');

// 👤 users table :
// role (client / chauffeur / admin)
// lat / lng (si utilisateur mobile)
// statut (online/offline)