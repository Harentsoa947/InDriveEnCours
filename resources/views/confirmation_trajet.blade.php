@extends('layouts.master')
@section('title', 'Confirmation de trajet')

@section('content')
<div class="container-fluid">
    {{-- {{ $reservation->id }} --}}
    <form action="{{ route('envoyeDemande') }}" method="post">
        <input type="hidden" name="idTrip" value="{{ $reservation->id }}">
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
        <div class="container-fluid">
            <div class="border text-center">
                <p class="valDep"><span class="fw-bold">Départ</span> : {{ $reservation->depart }}</p>
                <p class="valDes"><span class="fw-bold">Déstination</span> : {{ $reservation->destination }}</p>
                <p><span class="fw-bold">Distance de votre trajet</span> : {{ $reservation->kilometre }} KM</p>
    
            </div>
                
            <div class="mt-3 container w-50 border px-3 py-4">
                <h5>Filtrage de chauffeur</h5>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <label for="" class="mb-2">Distance entre vous et le chauffeur</label>
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
                    <div>
                        <label for="" class="mb-2">Type de voiture</label>
                        <select name="" id="" class="form-control">
                            <option value="">Tous</option>
                            <option value="">Non Electrique</option>
                            <option value="">Electrique</option>
                        </select>
                    </div>
                    <div>
                        <label for="" class="mb-2">Nombre de place</label>
                        <input type="number" name="" id="" placeholder="Nombre de place" class="form-control">
                    </div>
                    <div>
                        <label for="" class="mb-2">Bagages</label>
                        <select name="" id="" class="form-control">
                            <option value=""></option>
                            <option value="">Petit</option>
                            <option value="">Moyen</option>
                            <option value="">Beaucoup</option>
                        </select>
                        
                    </div>
                </div>
                
            </div>
               
        </div>
        
        {{-- Proposition prix --}}

        <div class="mt-5 w-25 mx-auto">
                
            <div>
                <label for="" class="mb-2">Modifier le prix (en Ar)</label>
                <input type="number" class="form-control w-50" value="1000" name="prixProposer">
            </div>
            <div class="mt-2">
                
                <div>
                    <label for=""></label>
                    <input type="submit" value="Envoyer votre demande" class="btn" style="background-color: #8fc906; font-weight: bold;">
                </div>
            </div>
            
        </div>
        <div>
            
            
            <h3 class="mt-5">Listes des chauffeurs</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Identifiant Chauffeur</th>
                        <th>Nom</th>
                        <th>Type voiture</th>
                        <th>Marque de voiture</th>
                        <th>Electrique</th>
                        <th>Maximum de place</th>
                        <th>Bagage</th>
                        <th>Distance</th>
                        <th>Demander</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chauffeur as $ch)

                        <tr id="ch{{ $ch->id }}" class="all_chauf">
                            <td class="affID">
                                <a href="{{ route('chauffeur', [
                                    'id' => $ch->id,
                                    'lat' => $reservation->latDep,
                                    'long' => $reservation->lonDep,
                                    'depart' => $reservation->depart,
                                    'distance' => $ch->distance
                                ]) }}">{{ $ch->id }}</a>
                            </td>
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
                                <input type="checkbox" name="chauffeur[]" value="{{ $ch->id }}">
                                <input type="hidden" name="Chauf_Passager[{{ $ch->id }}]" value="{{ $ch->distance }}">
                            </td>
                            
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