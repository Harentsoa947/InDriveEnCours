@extends('layouts.master')


@section('title', 'choix_trajet')

@section('content')
<div class="container-fluid my-3">
    {{-- Vue pour passager --}}
    <form action="" method="post">
       
        <div class="row">
            @if (auth()->user()->role == 'Chauffeur')
                <div class="col-lg-3">
                    Votre poste de travail est en cours de construction
                </div>
                                   
            @else
            <div class="col-lg-3 champ_recherche">
        
                <div class="distance mb-3"></div>
    
                <input type="hidden" name="kilometre" class="kilom">
    
                <div class="recherche2">
                    <div style="position: relative">
                        <div id="loader1" class="loader1"></div>
                        <input type="text" class="form-control" id="rech2" placeholder="Changer votre point de départ" name="depart">
                    </div>
                    {{-- <form action="" style="position: relative;">
                        
                    </form> --}}
                </div>
    
                {{-- <div style="margin: 10px 0;"></div> --}}
    
                <div class="recherche my-3">
                    <div style="position: relative">
                        <div id="loader" class="loader"></div>
                        <input type="text" id="rech" class="form-control" placeholder="Rechercher votre destination" name="destination">
                    </div>
                    {{-- <form action="" class="form" style="position: relative;">
                        
                    </form> --}}
                </div>
    
                <input type="submit" value="Réserver" class="btn btn-dark w-75 mx-auto d-block">
                
            </div> 
                
            @endif
            
            
            <div class="col-lg-9" style="position: relative;">
                <div id="fond">
                    <div class="loader2"></div>
                </div>
                <div id="map"></div>
            </div>
        </div> 
    </form>
           
</div>
@endsection