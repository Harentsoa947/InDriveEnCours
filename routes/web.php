<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Appelle API Laravel + JavaScript
Route::get('/villes/recherche', [CityController::class, 'recherche_ville']);
Route::get('/point/chauffeur', [CityController::class, 'point_chauffeur']);

// Global
Route::get('/', [GlobalController::class, 'accueil'])->name('accueil');
Route::get('/trajet', [GlobalController::class, 'trajet'])->name('trajet')->middleware('auth');

// Pour Passager
Route::get('choix_trajet', [GlobalController::class, 'choix_trajet'])->name('choix_trajet')->middleware('auth');
Route::post('/new_trajet', [GlobalController::class, 'new_trajet'])->name('new_trajet')->middleware('auth');

Route::get('/confirmation/{validation?}', [GlobalController::class, 'confirmation'])->name('confirmation')->middleware('auth');
Route::post('/envoyeDemande', [GlobalController::class, 'envoyeDemande'])->name('envoyeDemande')->middleware('auth');

Route::get('chauffeur/{id}', [GlobalController::class, 'chauffeur'])->name('chauffeur');

// Pour Chauffeur
Route::get('/afficher_trajet/{id?}', [GlobalController::class, 'afficher_trajet'])->name('afficher_trajet')->middleware('auth');