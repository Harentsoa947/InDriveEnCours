@extends('layouts.master')
@section('title', 'Page pour chauffeur')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center">Chauffeur</h1>
        <h3 class="text-center">{{ $chauffeur->name }}</h3>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-6 ">
                <ul>
                    {{-- <li class="mt-4 "></li> --}}
                    <li class="img_user d-flex align-items-center gap-5 mb-3">
                        <img src="{{ asset('images/imageUber.jpg') }}" alt="non trouvé">
                        <div>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        
                    </li>
                    <li><span class="fw-bold">Numéro de téléphone : </span>{{ $chauffeur->numero_phone }}</li>
                    <li><span class="fw-bold">Status : </span>Libre ou pas en ce  moment</li>
                    <li>
                        <span class="fw-bold">Information de son voiture :</span>
                        <ul>
                            <li><span class="fw-bold">Electrique</span> : Oui</li>
                            <li><span class="fw-bold">Marque du voiture</span> : {{ $chauffeur->marque_voiture }}</li>
                            <li><span class="fw-bold">Type du voiture</span> : {{ $chauffeur->typeVoiture->type }}</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div id="map"></div>
            </div>
           
        </div>
    </div>
@endsection