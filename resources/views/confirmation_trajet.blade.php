@extends('layouts.master')
@section('title', 'Confirmation de trajet')

@section('content')
<div class="container">
    {{-- @dd($reservation) --}}
    {{-- <a href="" class="btn btn-primary">
        <i class="fa fa-arrow-left"></i>
    </a> --}}
    <h1 class="text-center">Recherche de chauffeur</h1>
    <div>
        <p class="valDep"><span class="fw-bold">Départ</span> : {{ $reservation->depart }}</p>
        <p class="valDes"><span class="fw-bold">Déstination</span> : {{ $reservation->destination }}</p>
        <h5>Distance chauffeur</h5>
        <select name="" id="" class="form-control">
            <option value="">1 KM</option>
            <option value="">2 KM</option>
            <option value="">3 KM</option>
        </select>
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
                    <th>Place dispo</th>
                    <th>Bagage</th>
                    <th>Alerter</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chauffeur as $ch)
                    <tr>
                        <td>{{ $ch->id }}</td>
                        <td>{{ $ch->name }}</td>
                        <td>{{ $ch->type_voitures_id }}</td>
                        <td>{{ $ch->marque_voiture }}</td>
                        @if ($ch->electrique)
                            <td>Oui</td>    
                        @else
                            <td>Non</td>
                        @endif
                        <td>En cours ...</td>
                        <td>En cours ...</td>
                        <td><input type="checkbox" name="" id=""></td>
                    </tr>    
                @endforeach
                
            </tbody>
        </table>
    </div>
    <div>
        {{-- @foreach ($chauffeur as $ch)
            <p class="chauf">{{ $ch->id }}</p>
        @endforeach --}}
    </div>
</div>
    
@endsection