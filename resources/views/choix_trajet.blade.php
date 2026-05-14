@extends('layouts.master')


@section('title', 'choix_trajet')

@section('content')
<div class="container-fluid my-3">
    {{-- Vue pour passager --}}
    <div style="display: block" id="affMap">
        <form action="{{ route('new_trajet') }}" method="post">
            @csrf
             <div class="row">
                 @if (auth()->user()->role == 'Chauffeur')
                     <div class="col-lg-3">
                         Votre poste de travail est en cours de construction
                     </div>
                                        
                 @else
                     <div class="col-lg-3 champ_recherche">
     
                         @if ($errors->any())
                             <div class="alert alert-danger">
                                 <ul class="mb-0">
                                     @foreach ($errors->all() as $error)
                                         <li>{{ $error }}</li>
                                     @endforeach
                                 </ul>
                             </div>
                         @endif
                 
                         <div class="distance mb-3"></div>
             
                         <input type="hidden" name="kilometre" class="kilom">
             
                         <div class="recherche2">
                             <div style="position: relative">
                                 <div id="loader1" class="loader1"></div>
                                 <input type="text" class="form-control @error('depart') is-invalid @enderror" id="rech2" placeholder="Changer votre point de départ" name="depart">
                             </div>
                             
                         </div>
             
                         
             
                         <div class="recherche my-3">
                             <div style="position: relative">
                                 <div id="loader" class="loader"></div>
                                 <input type="text" id="rech" class="form-control @error('destination') is-invalid @enderror" placeholder="Rechercher votre destination" name="destination">
                             </div>
                             
                         </div>
             
                         <input type="submit" value="Valider" class="btn btn-dark w-75 mx-auto d-block" id="carte">
     
     
                         <div id="affDis" class="mt-3">
                             
                         </div>
                         
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
</div>
@endsection