@extends('layouts.master')

@section('title', 'InDrive')

@section('content')
<form action="" method="POST">
    <div class="container" style="margin: 60px auto;">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-center justify-content-lg-start">
                <div class="ajuste">
                    <div class="d-flex gap-3">
                        <!-- Appelle au fonction javascript pour définir le lieu auto -->
                        <i class="fa-solid fa-location-dot"></i>
                        <h6>Antananarivo, MG</h6>
                    </div>
                    
                    <h1 class="fw-bold my-3" style="color: #000; font-size: 3.1em;">Allez où vous <br>voulez avec InDrive</h1>
                    <div class="choix_temps ms-4 my-3">
                        <i class="fa-solid fa-clock"></i>
                        <select name="" id="">
                            <option value="">
                                <i class="fa-solid fa-clock"></i>
                                Prendre en charge maintenant
                            </option>
                            <option value="">Planifier plus tard</option>
                        </select>
                    </div>
                    <div class="champs my-3">
                      <div>
                        <div class="de depart d-flex align-items-center" style="position: relative;">
                          <i class="fa-solid fa-circle" style="position: relative;">
                              <div class="trace"></div>
                          </i>
                          <div class="loader1"></div>
                          <input type="text" placeholder="Départ" class="ms-3" id="dep">
                          <div id="resultat"></div>
                      </div>
                      
                      </div>
                        <br>
                        <div class="de destination d-flex align-items-center" style="position: relative;">
                            <i class="fa-solid fa-square"></i>
                            <div class="loader2"></div>
                            <input type="text" placeholder="Destination" class="ms-3" id="dest">
                            <div id="resultat2"></div>
                        </div>
                    </div>
                    <div class="reserver">
                        <a href="{{ route('choix_trajet') }}">Réserver</a>
                        {{-- <button>Réserver</button> --}}
                    </div>
                </div>
                
            </div>
            <div class="col-lg-6 imUber d-none d-lg-block">
                <img src="{{ asset('images/imageUber.jpg') }}" alt="imageUber">
            </div>
        </div>
    </div>   
</form>
 
@endsection