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
          <li class="nav-item">
            <a class="nav-link" href="#" style="color: #fff;">Déplacer-vous avec InDrive</a>
            <!-- <a class="nav-link active"href="#">Déplacer-vous avec InDrive</a> -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Génerer des revenus</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Professionel</a>
          </li>
          
        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0">
            {{-- @dd(auth()->user()->role) --}}
            @auth
              
              <li class="nav-item connecter_user">
                <a class="nav-link" href="">{{ auth()->user()->name }} ({{ auth()->user()->role }})</a>
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
                  <a class="nav-link" href="{{ route('login') }}" id="inscript">Se connecter</a>
              </li>    
            @endguest
            
        </ul>
      </div>
    </div>
</nav>