@extends('layouts.master')
@section('title', 'Historique')

@section('content')
    <div class="container mt-3">
        <h1 class="my-3 text-center">Votre historique</h1>
        <div class="w-25 mx-auto mb-3 p-4 shadow">
            <p>Rechercher par date</p>
            <input type="date" name="" id="" class="form-control">
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Date et heure</th>
                    {{-- @dd($role) --}}
                    @if ($role == "pa")
                        <th>Chauffeur</th>
                    @endif
                    @if ($role == "ch")
                        <th>Passager</th>    
                    @endif
                    
                    <th>Départ</th>
                    <th>Déstination</th>
                    <th>Distance du trajet</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histo as $tr)
                    <tr>
                        <td>{{ $tr->updated_at->format('d-m-Y') }}</td>
                        @if ($role == "pa")
                            <td>{{ $tr->driver->name }}</td>
                        @endif
                        @if ($role == "ch")
                            <td>{{ $tr->user->name }}</td>    
                        @endif
                        
                        <td>{{ $tr->depart }}</td>
                        <td>{{ $tr->destination }}</td>
                        <td>{{ $tr->kilometre }} KM</td>
                        <td>{{ $tr->note }} étoile</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection