<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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

Route::get('/', [GlobalController::class, 'accueil'])->name('accueil');
Route::post('/', [GlobalController::class, 'reservation']);
Route::get('choix_trajet', [GlobalController::class, 'choix_trajet'])->name('choix_trajet');
// Route::get('register2', [GlobalController::class, 'register2'])->name('register2');
Route::get('connexion', [GlobalController::class, 'connexion'])->name('connexion');