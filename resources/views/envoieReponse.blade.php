@extends('layouts.master')
@section('title', 'Envoye Réponse')

@section('content')
    <h2 class="text-center mt-4">Passager à {{ $requete->Chauf_Pass_Dis }} KM</h2>
    <p class="text-center">Nom du Passager: <a href="#">{{ $requete->passager->name }}</a></p>
    <div class="container mt-4 text-center w-50 border py-4">
        <h3>{{ $requete->depart }} - {{ $requete->destination }} - {{ $requete->disTrajet }} KM</h3>
        <p>Prix de base: A Modifier(attente du prix de base)</p>
        <div>
            <input type="submit" class="btn btn-success" value="Accepter">
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#contenu">Modifier</button>
        </div>
        <div class="collapse mt-3" id="contenu">
            <label for="">Modifier Prix (en Ar)</label>
            <input type="hidden" name="idReq">
            <input type="number" value="{{ $requete->prixProposer }}" class="form-control mb-2 w-25 mx-auto">
            <input type="submit" value="Envoyer" class="btn btn-primary">
        </div>    
        
    </div>
@endsection