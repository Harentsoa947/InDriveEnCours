@extends('layouts.master')
@section('title', 'Les trajets en attente')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center">Les trajets en attente</h1>
        <table class="table mt-5">
            <thead class="thead-dark">
                <tr>
                    <th>Id trajet</th>
                    <th scope="col">Passager</th>
                    <th>Numéro de téléphone</th>
                    <th scope="col">Date du demande</th>
                    <th scope="col">Heure du demande</th>
                    <th scope="col">Départ</th>
                    <th scope="col">Déstination</th>
                    <th scope="col">kilometre</th>
                    <th scope="col">Prix par défault</th>
                    <th scope="col">Confirmation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trip as $t)
                    <tr>
                        <td>{{ $t->id }}</td>
                        <td>{{ $t->user->name }} </td>
                        <td>{{ $t->user->numero_phone }}</td>
                        <td>{{ $t->created_at->format('d-m-Y') }}</td>
                        <td>{{ $t->created_at->format('H:i') }}</td>
                        <td>{{ $t->depart }}</td>
                        <td>{{ $t->destination }}</td>
                        <td>{{ $t->kilometre }} KM</td>
                        <td>{{ $t->prix }}</td>
                        <td><input type="checkbox" name="accepter" id="" class="form-check-input" style="width: 30px; height: 30px"></td>
                    </tr>    
                @endforeach
                
                
            </tbody>
        </table>
    </div>
    
@endsection