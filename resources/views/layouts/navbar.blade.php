<nav class="navbar navbar-expand-lg first_nav">
    <div class="container logo">
      <a class="navbar-brand" href="{{ route('accueil') }}" style="color: #fff;">
        <img src="images/indrive-icon-logo.png" alt="Logo de InDrive">
        InDrive
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent diff_lien">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @auth
            @if (auth()->user()->role == 'Chauffeur')
              <li class="nav-item" style="position: relative">
                <a class="nav-link" href="#" style="color: #fff;">Configurer votre tarif</a>
              </li>    
            @endif    
          @endauth
          
          
          <li class="nav-item">
            <a  href="#" 
              @class([
                'nav-link', 
                'activePers' => request()->routeIs('tarif')
              ])>
            {{-- class="nav-link activePers"> --}}
              Tarifs de base
            </a>
          </li>
          @auth
            @if (auth()->user()->role == 'Chauffeur')
              <li class="nav-item" style="position: relative">
                <a class="nav-link" href="#">Réservation en cours <span class="nb_res">5</span></a>
              </li>
            @else
              <li class="nav-item">
                <a href="{{ route('choix_trajet') }}" 
                @class(['nav-link', 'activePers' => request()->routeIs('choix_trajet')])>
                  Planifier un trajet
                </a>
              </li>    
            @endif
            
          @endauth
          
          
        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0">
            @auth
            <li class="nav-item inscription">
              <a class="nav-link inscript" href="#">Compte : {{ auth()->user()->role }}</a>
            </li> 
              <li class="nav-item connecter_user ms-4">
                <a class="nav-link" href="">{{ auth()->user()->name }}</a>
                <div class="plus">
                  <ul>
                    <li><a href="{{ route('dashboard') }}">Profil</a></li>
                    <form action="{{ route('logout') }}" method="post">
                      <li><button type="submit">Se déconnecter</button></li>
                    </form>
                         
                  </ul>
                </div>
              </li>
              
              <br>
              
            @endauth
            @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Inscription</a>
              </li>
              <li class="nav-item inscription ms-3">
                  <a class="nav-link inscript" href="{{ route('login') }}">Se connecter</a>
              </li>    
            @endguest
            
        </ul>
      </div>
    </div>
</nav>
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session('decon'))
  <div class="alert alert-danger">{{ session('decon') }}</div>
@endif