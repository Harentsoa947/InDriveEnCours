@extends('layouts.master')
@section('title', 'Les trajets en attente')

@section('content')
    <div id="voi" style="display: none;">{{ $requete }}</div>
    <div
        @class(['container-fluid', 'principal' => !empty($id)])>
        <h1 class="text-center">Les trajets en attente</h1>
        <table class="table mt-5">
            <thead class="thead-dark">
                <tr>
                    <th>Id trajet</th>
                    <th scope="col">Passager</th>
                    <th scope="col">Demande</th>
                    <th scope="col">Départ - Déstination</th>
                    <th scope="col">Distance du trajet</th>
                    <th scope="col">Distance vers le client</th>
                    <th scope="col">Prix de base</th>
                    <th scope="col">Prix proposé</th>
                    <th>Action</th>
                    {{-- <th scope="col">Confirmation</th> --}}
                </tr>
            </thead>
            <tbody>
                @if (empty($id))
                @foreach ($trips as $t)
                    <tr>
                        <td>{{ $t->id }}</td>
                        <td><a href="#" style="text-transform: capitalize; text-decoration: none">{{ $t->user->name }}</a></td>
                        <td>
                            <p>{{ $t->created_at->format('d-m-Y') }}</p> 
                            <p>{{ $t->created_at->format('H:i') }}</td></p>
                        <td>
                            <p>{{ $t->depart }}</p>
                            <p>{{ $t->destination }}</p>
                        </td>
                        <td>{{ $t->kilometre }} KM</td>
                        <td>{{ $t->kilometre }} KM</td>
                        <td>{{ $t->prix }} Ar</td>
                        <td>{{ $t->prix }} Ar</td>
                        <td><a class="btn btn-dark" href="{{ route('afficher_trajet', $t->id) }}">Voir <i class="fa fa-eye" aria-hidden="true"></i></a></td>
                    </tr>
                @endforeach
                @endif
                
            </tbody>
        </table>
    </div>
    @if (!empty($id))
        <div class="detail">
            <a href="{{ route('afficher_trajet') }}">
                <i class="fa-solid fa-x" style="color: red; font-weight: bold; font-size: 30px; position: absolute; right: 20px; cursor: pointer"></i>
            </a>
            {{-- @dd($trip) --}}
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
    @endif
    
    
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