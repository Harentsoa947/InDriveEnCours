@extends('layouts.master')

@section('title', 'Notez le chauffeur')

@section('content')
    <form action="{{ route('notes') }}" method="post">
        <div class="container mt-5">
            <h1 class="text-center mb-4">Trajet fini</h1>
            <h3 class="text-center">Chauffeur : {{ $trip->driver->name }}</h3>
            <p class="text-center">De <span class="fw-bold">{{ $trip->depart }}</span> vers <span class="fw-bold">{{ $trip->destination }}</span></p>
    
            
            <div class="text-center etoile py-4">
                <p class="text-white">Notez le chauffeur</p>
                <div>
                    <i class="fa fa-star star1" aria-hidden="true"></i>
                    <i class="fa fa-star star2" aria-hidden="true"></i>
                    <i class="fa fa-star star3" aria-hidden="true"></i>
                    <i class="fa fa-star star4" aria-hidden="true"></i>
                    <i class="fa fa-star star5" aria-hidden="true"></i>
                </div>
                
                <input type="hidden" name="retourPassa" value="0" class="retourPassa">
                <input type="hidden" name="idTrajet" value="{{ $trip->id }}">
                <input type="submit" value="Soumettre le note" class="mt-3 btn btn-primary">
                <a href="#" class="ignor">Ignorer</a>
            </div>
    
            
        </div>
    </form>
    
@endsection