@extends('layouts.master')
@section('title', 'Information Trajet')
@section('content')
    <div class="container-fluid mt-3">
        
        
        @if($trip->isEmpty())
            <h2 class="text-center mt-3">Pas de trajet planfier en ce moment</h2>
        @else
            <h1 class="text-center">Page d'information trajets</h1>
            <h2>Votre commande</h2>
            <div class="container-fluid">
                <table class="table">
                    <thead>
                        <th>Identifiant trajet</th>
                        <th>Chauffeur</th>
                        <th>Départ</th>
                        <th>Déstination</th>
                        <th>Distance du trajet</th>
                        {{-- <th>État du trajet</th> --}}
                        <th>Réponse du chauffeur</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($trip as $t)
                            <tr>
                                <td>{{ $t->trajet->id }}</td>
                                <td><a href="#">{{ $t->chauffeur->id }}</a></td>
                                <td>{{ $t->trajet->depart }}</td>
                                <td>{{ $t->trajet->destination }}</td>
                                <td>{{ $t->trajet->kilometre }} KM</td>
                                {{-- <td>{{ $t->trajet->status }}</td> --}}
                                <td>
                                    @if ($t->reponse_chauffeur === true)
                                        <p style="background: green;" class="text-center text-white py-2">Demande acceptée</p>
                                    @elseif ($t->prix_chauffeur != null)
                                        <p style="background: rgb(17, 0, 255);" class="text-center text-white py-2 px-1">{{ $t->prix_chauffeur }} Ar</p>
                                    @elseif ($t->reponse_chauffeur === false)
                                        <p style="background: red;" class="text-center text-white py-2">Demande refuser</p>
                                    @else
                                        <p>En attente...</p>
                                    @endif
                                </td>
                                <td>
                                    @if ($t->reponse_chauffeur === true)
                                        <form action="{{ route('successTrajet') }}" method="post">
                                            <input type="hidden" name="idTrajet" value="{{ $t->trajet->id }}">
                                            <input type="hidden" name="chauffeur" value="{{ $t->chauffeur->id }}">
                                            <input type="submit" value="Choisir" class="btn btn-primary">
                                            <a href="{{ route('supprimer', [$t->id]) }}" class="btn btn-danger">Supprimer</a>
                                        </form>
                                    @elseif ($t->prix_chauffeur != null)
                                        <input type="submit" value="Accepter prix" class="btn btn-primary">
                                        <a href="{{ route('supprimer', [$t->id]) }}" class="btn btn-danger">Refuser</a>
                                    @elseif ($t->reponse_chauffeur === false)
                                        <a href="{{ route('supprimer', [$t->id]) }}" class="btn btn-danger">Supprimer</a>
                                    @else
                                        <a href="{{ route('supprimer', [$t->id]) }}" class="btn btn-secondary">Annuler</a>
                                    
                                    @endif
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
            
        @endempty
        
    </div>
    
@endsection