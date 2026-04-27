@extends('layouts.master')


@section('title', 'choix_trajet')

@section('content')
<div class="container-fluid my-3">
    <div class="row">
        <div class="col-lg-3 champ_recherche">

            <div class="distance mb-3">12 mètres</div>

            <div class="recherche2">
                <form action="" style="position: relative;">
                    <div id="loader1" class="loader1"></div>
                    <input type="text" class="form-control" id="rech2" placeholder="Changer votre point de départ">
                </form>
            </div>

            <div style="margin: 90px 0;"></div>

            <div class="recherche">
                <form action="" class="form" style="position: relative;">
                    <div id="loader" class="loader"></div>
                    <input type="text" id="rech" class="form-control" placeholder="Rechercher votre destination">
                </form>
            </div>
            
        </div>
        
        <div class="col-lg-9" style="position: relative;">
            <div id="fond">
                <div class="loader2"></div>
            </div>
            <div id="map"></div>
        </div>
    </div>        
</div>
@endsection