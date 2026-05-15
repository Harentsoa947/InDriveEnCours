@extends('layouts.master')
@section('title', 'Confirmation de trajet')

@section('content')
<div class="container-fluid">
    <h1 class="text-center">Recherche de chauffeur</h1>
    <div class="row">
        <div class="col-lg-9">
            <p class="valDep"><span class="fw-bold">Départ</span> : {{ $reservation->depart }}</p>
            <p class="valDes"><span class="fw-bold">Déstination</span> : {{ $reservation->destination }}</p>
            <p><span class="fw-bold">Distance de votre trajet</span> : {{ $reservation->kilometre }} KM</p>
        </div>
        <div class="col-lg-3">
            <h5>Filtrage de chauffeur</h5>
            <div class="w-75">
                <select name="" id="" class="form-control">
                    <option value="">&lt; 5 KM</option>
                    <option value="">&lt; 15 KM</option>
                    <option value="">&lt; 20 KM</option>
                    <option value=""> Tout</option>
                </select>
            </div>    
        </div>
    </div>
    {{-- Proposition prix --}}
    <div>
        
        
        
        <div style="display: flex; align-items: center;">
            <p class="mt-5">Listes des chauffeurs</p>
            <input type="submit" value="Envoyer votre demande" class="btn btn-dark">
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Numéro Chauffeur</th>
                    <th>Nom</th>
                    <th>Type voiture</th>
                    <th>Marque de voiture</th>
                    <th>Electrique</th>
                    <th>Maximum de place</th>
                    <th>Bagage</th>
                    <th>Distance</th>
                    <th>Alerter</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($chauffeur) --}}
                @foreach ($chauffeur as $ch)
                    <tr>
                        <td class="affID">{{ $ch->id }}</td>
                        <td>{{ $ch->name }}</td>
                        <td>{{ $ch->typeVoiture->type }}</td>
                        <td>{{ $ch->marque_voiture }}</td>
                        @if ($ch->electrique)
                            <td>Oui</td>    
                        @else
                            <td>Non</td>
                        @endif
                        <td>{{ $ch->typeVoiture->nbr_passager }}</td>
                        {{-- <td> --}}
                            @if ($ch->typeVoiture->bagage == 1)
                                <td>Petit Bagage</td>
                            @elseif($ch->typeVoiture->bagage == 2)
                                <td>Moyen Bagage</td>
                            @elseif($ch->typeVoiture->bagage == 3)
                                <td>Supporte beaucoup de bagage</td>
                            @else
                                <td>Aucun bagage</td>
                            @endif
                        {{-- </td> --}}
                        <td>{{ $ch->distance }} KM</td>
                        <td><input type="checkbox" name="idChauf" value="idChauf" id=""></td>
                        
                    </tr>    
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
    
@endsection