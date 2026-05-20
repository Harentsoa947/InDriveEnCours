@extends('layouts.master')
@section('title', 'Envoye Réponse')

@section('content')
    <form action="{{ route('responseChauffeur') }}" method="post">
        
        <h2 class="text-center mt-4">Passager à {{ $requete->Chauf_Pass_Dis }} KM</h2>
        <p class="text-center">Nom du Passager: <a href="#">{{ $requete->passager->name }}</a></p>
        <div class="container mt-4 text-center w-50 border py-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $er)
                        <p>{{ $er }}</p>
                    @endforeach
                </div>
            @endif
            <h3>{{ $requete->depart }} - {{ $requete->destination }} - {{ $requete->disTrajet }} KM</h3>
            <p>Prix de base: A Modifier(attente du prix de base)</p>
            <p>Prix proposé : {{ $requete->prixProposer }} Ar</p>
            <div>
                <input type="submit" class="btn btn-success" value="Accepter" name="action">
                <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#contenu">Modifier</button>
            </div>
            <div class="collapse mt-3" id="contenu">
                <label for="">Modifier Prix (en Ar)</label>
                <input type="hidden" name="idReq" value="{{ $requete->id }}">
                <input type="number" value="{{ $requete->prixProposer }}" class="form-control mb-2 w-25 mx-auto" name="prixChauf">
                <input type="submit" class="btn btn-primary" value="Appliquer modification" name="action">
            </div>    
        </div>
    </form>
    
@endsection