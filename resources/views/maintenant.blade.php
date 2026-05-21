@extends('layouts.master')

@section('title', 'Trajet en ce moment')

@section('content')
    {{-- Point Passager --}}
    <input type="hidden" name="" id="latUser" value="{{ $trip->driver->localChauf->latChauf }}">
    <input type="hidden" name="" id="lonUser" value="{{ $trip->driver->localChauf->lonChauf }}">
    <p class="position d-none"></p>
    {{-- Point Chauffeur --}}
    <h1 class="d-none latitude">{{ $trip->latDep }}</h1>
    <h1 class="d-none longitude">{{ $trip->lonDep }}</h1>
    

    <div class="container mt-5">
        <h1 class="text-center mb-3">Trajet maintenant</h1>
        <div class="row">
            <div class="col-lg-6">
                <p>Départ: {{ $trip->depart }}</p>
                <p>Déstination: {{ $trip->destination }}</p>
                <p>Distance du trajet: {{ $trip->kilometre }} KM</p>
                <form action="{{ route('prevenirPassager') }}" method="post">
                    @csrf
                    <input type="hidden" name="trajet" value="{{ $trip->id }}">
                    @if ($trip->status == 'planifier')
                        <input type="submit" value="Allez vers le passager" class="btn btn-primary" name="action">
                    @elseif($trip->status == 'driversVersPassager')
                        <input type="submit" value="Arriver au point du passager" class="btn btn-warning" name="action">
                    @elseif($trip->status == 'AttentePass')
                        <input type="submit" value="Commencer le trajet" class="btn btn-secondary" name="action">
                    @elseif($trip->status == 'InTrajet')
                        <input type="submit" value="Fini" class="btn btn-danger" name="action">
                    @endif
                    
                    
                </form>
                
            </div>
            <div class="col-lg-6">
                <div id="map"></div>
            </div>
        </div>
    </div>
@endsection
