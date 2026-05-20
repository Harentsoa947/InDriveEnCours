@extends('layouts.master')
@section('title', 'Les trajets en attente')

@section('content')
    @empty($request_chauffeur)
        <h1 class="mt-5 text-center">Pas encore de demande pour vous</h1>
    @else
    {{-- <form action="" method="post"> --}}
        <div
        @class(['container-fluid'])>
        <h1 class="text-center">Les trajets en attente</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger w-25 mx-auto">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="diso">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- <div class="alert alert-danger w-25 mx-auto">erreur</div> --}}
        
        <table class="table mt-5">
            <thead class="thead-dark">
                <tr>
                    <th>Id trajet</th>
                    <th scope="col">Passager</th>
                    <th scope="col">Demande</th>
                    <th scope="col">Départ - Déstination</th>
                    <th scope="col">Distance du trajet</th>
                    <th scope="col">Distance vers le client</th>
                    <th scope="col">Prix</th>
                    {{-- <th scope="col">Prix proposé</th> --}}
                    <th>Action</th>
                    {{-- <th scope="col">Confirmation</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($request_chauffeur as $t)
                    <tr>
                        <td>{{ $t->id }}</td>
                        {{-- <input type="hidden" name="idTrajet" value="{{ $t->id }}"> --}}
                        <td><a href="#" style="text-transform: capitalize; text-decoration: none">{{ $t->passager_id }}</a></td>
                        <td>
                            <p>{{ $t->created_at->format('d-m-Y') }}</p> 
                            <p>{{ $t->created_at->format('H:i') }}</td></p>
                        <td>
                            <p>{{ $t->depart }}</p>
                            <p>{{ $t->destination }}</p>
                        </td>
                        <td>{{ $t->disTrajet }} KM</td>
                        <td>{{ $t->Chauf_Pass_Dis }} KM</td>
                        <td>
                            {{ $t->prixProposer }} Ar (base) <br>
                            {{ $t->prixProposer }} Ar (Proposer)
                        </td>
                        
                        <td>
                            <a href="{{ route('envoieReponse', [$t->id]) }}" class="btn btn-primary">
                                <i class="fa-solid fa-eye"></i>
                                Voir
                            </a><br>
                            <a href="" class="btn btn-danger mt-3">
                                <i class="fa-solid fa-x"></i>
                                Refuser
                            </a>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        
        
    </div>
    {{-- </form> --}}
    @endempty




    {{-- @if (!empty($id))
        <div class="detail">
            <a href="{{ route('afficher_trajet') }}">
                <i class="fa-solid fa-x" style="color: red; font-weight: bold; font-size: 30px; position: absolute; right: 20px; cursor: pointer"></i>
            </a>
            <div class="mt-5 px-3">
                <h3 class="text-center">Info sur le trajet</h3>
                <h5 class="text-center">({{ $trip->kilometre }} Km / Prix par défault : {{ $trip->prix }} Ar)</h5>
                <div class="mb-3 mt-4">
                    <label for="">Départ</label>
                    <input type="text" class="form-control" value="{{ $trip->depart }}">
                </div>
                <div class="mb-3">
                    <label for="">Déstination</label>
                    <input type="text" class="form-control" value="{{ $trip->destination }}">
                </div>
                <div class="mb-3">
                    <label for="">Modifier le prix (Prix supposer par le passager en Ar)</label>
                    <input type="text" class="form-control" value="500 Ar">
                </div>
                <button class="btn btn-dark mx-auto text-center">Supposer le prix</button>
                
                
            </div>
            
        </div>
    @endif --}}
    {{-- <button class="btn btn-primary" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#contenu">
    Afficher / Masquer
    </button>

    show: pour afficher par défaut
    <div class="collapse show" id="contenu">
    <div class="card card-body">
        Ceci est le contenu caché.
    </div>
    </div> --}}
    
@endsection
{{-- Role : chauffeur --}}

{{-- 
    1.Compacte (Image d'une petite voiture)

    2.Berline (Image d'une voiture allongée)

    3.SUV / 4x4 (Image d'une voiture haute)

    4.Van (Image d'une voiture à 7 places) 
    
    Voiture électrique alimentation
--}}


{{-- 
    Type,               Description Visuelle,                                   Usage pour le Passager
    Compacte,           Petite voiture (ex: Peugeot 208),                       "Économique, pour 1-2 personnes."
    Berline,            Voiture allongée (ex: Toyota Corolla),                  "Confortable, avec un vrai coffre."
    SUV / 4x4,          Voiture haute (ex: Dacia Duster),                       "Robuste, espace et sécurité."
    Van,                Voiture à 7 places (ex: Mini-bus),                      Pour les groupes et familles. 
--}}