<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\GlobalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/villes/recherche', [CityController::class, 'recherche_ville']);
// /api/villes/recherche


Route::get('accueil', [GlobalController::class, 'accueil'])->name('accueil');