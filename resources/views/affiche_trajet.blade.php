@extends('layouts.master')
@section('title', 'Les trajets en attente')

@section('content')
    <div
        @class(['container-fluid', 'principal' => !empty($id)])>
        <h1 class="text-center">Les trajets en attente</h1>
        <table class="table mt-5">
            <thead class="thead-dark">
                <tr>
                    <th>Id trajet</th>
                    <th scope="col">Passager</th>
                    {{-- <th>Numéro de téléphone</th> --}}
                    <th scope="col">Date du demande</th>
                    <th scope="col">Heure du demande</th>
                    <th scope="col">Départ</th>
                    <th scope="col">Déstination</th>
                    <th scope="col">kilometre</th>
                    <th scope="col">Prix par défault</th>
                    <th>Planifier</th>
                    {{-- <th scope="col">Confirmation</th> --}}
                </tr>
            </thead>
            <tbody>
                @if (empty($id))
                @foreach ($trips as $t)
                    <tr>
                        <td>{{ $t->id }}</td>
                        <td><a href="#" style="text-transform: capitalize; text-decoration: none">{{ $t->user->name }}</a></td>
                        {{-- <td>{{ $t->user->numero_phone }}</td> --}}
                        <td>{{ $t->created_at->format('d-m-Y') }}</td>
                        <td>{{ $t->created_at->format('H:i') }}</td>
                        <td>{{ $t->depart }}</td>
                        <td>{{ $t->destination }}</td>
                        <td>{{ $t->kilometre }} KM</td>
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