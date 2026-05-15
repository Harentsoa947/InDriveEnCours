@extends('layouts.master')
@section('title', 'Confirmation de trajet')

@section('content')
<div class="container-fluid">
    <form action="{{ route('envoyeDemande') }}" method="post">
        
        <input type="hidden" name="dep" value="{{ $reservation->depart }}">
        <input type="hidden" name="des" value="{{ $reservation->destination }}">
        <input type="hidden" name="disTrajet" value="{{ $reservation->kilometre }}">
        <h1 class="text-center my-4">Envoyer votre demande</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $er)
                    <p>{{ $er }}</p>
                @endforeach
            </div>
        @endif
        <div class="row">
            <div class="col-lg-9">
                <p class="valDep"><span class="fw-bold">Départ</span> : {{ $reservation->depart }}</p>
                <p class="valDes"><span class="fw-bold">Déstination</span> : {{ $reservation->destination }}</p>
                <p><span class="fw-bold">Distance de votre trajet</span> : {{ $reservation->kilometre }} KM</p>
    
            </div>
            <div class="col-lg-3">
                <h5>Filtrage de chauffeur</h5>
                <div class="w-75">
                    <select name="" id="kilom" class="form-control">
                        {{-- <option value="3">&lt; 3 KM</option> --}}
                        <option value="5">&lt; 5 KM</option>
                        <option value="6">&lt; 6 KM</option>
                        <option value="7">&lt; 7 KM</option>
                        <option value="8">&lt; 8 KM</option>
                        <option value="9">&lt; 9 KM</option>
                        <option value="10">&lt; 10 KM</option>
                        <option value="50"> Tous</option>
                    </select>
                </div>    
            </div>
        </div>
        {{-- Proposition prix --}}
        <div>
            <div class="d-flex justify-content-around align-items-center">
                
                <div>
                    <label for="">Modifier le prix (en Ar)</label>
                    {{-- Prix par rapport au distance --}}
                    <input type="number" class="form-control" value="1000" name="prixProposer">
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    
                    <div>
                        <label for=""></label>
                        <input type="submit" value="Envoyer votre demande" class="btn" style="background-color: #8fc906; font-weight: bold;">
                    </div>
                </div>
                
            </div>
            
            <h3 class="mt-5">Listes des chauffeurs</h3>
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
                    @foreach ($chauffeur as $ch)
                        {{-- if $ch->distance < 5 --}}
                        {{-- affichage --}}
                        
                        <tr id="ch{{ $ch->id }}" class="all_chauf">
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
                                @if ($ch->typeVoiture->bagage == 1)
                                    <td>Petit Bagage</td>
                                @elseif($ch->typeVoiture->bagage == 2)
                                    <td>Moyen Bagage</td>
                                @elseif($ch->typeVoiture->bagage == 3)
                                    <td>Supporte beaucoup de bagage</td>
                                @else
                                    <td>Aucun bagage</td>
                                @endif
                                <td class="distance" data-distance="{{ $ch->distance }}">
                                    {{ $ch->distance }} KM
                                </td>
                            <td>
                                <input type="checkbox" name="chauffeur[]" value="{{ $ch->id }}" id="">
                            </td>
                            <input type="hidden" name="Chauf_Passager" value="{{ $ch->distance }}">
                        </tr>    
                    @endforeach
                    
                </tbody>
            </table>
            
        </div>
        <p id="no-driver" class="text-danger fw-bold" style="display:none;">
            Aucun chauffeur disponible
        </p>
    </form>
    
</div>
    
@endsection