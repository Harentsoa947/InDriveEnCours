// Etat initial
const rowConnexion = document.querySelector('.rowConn')
const rowInsc = document.querySelector('.rowInsc')
connexion(rowConnexion)
// inscription(rowInsc)


function connexion(row){
    const divCol = document.createElement('div')
    
    divCol.classList.add('col-lg-6', 'text', 'ps-4', 'order-1', 'order-lg-2', 'divCol')
    

    divCol.innerHTML = `
    <div class="logo pe-4">
        <img src="images/indrive-icon-logo.png" alt="">
    </div>
    <div class="titre pe-4">
        <h1>Connectez-vous</h1>
        <p>Choisissez votre prix</p>
    </div>
    <form action="{{ route('login') }}" method="post" class="pe-4">
        @csrf
        <input type="text" placeholder="Nom" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
        @error('name', 'login')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
        <input type="password" placeholder="Mots de passe" name="password" class="form-control @error('password') is-invalid @enderror">
        @error('password', 'login')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
        <input type="submit" value="Se connecter" class="btn btn-dark w-50 d-block mx-auto inscri my-4">
        <p class="insc">
            Pas encore de compte? 
            <a href="#" class="ins" id="show-register">S'inscrire</a>
        </p>
    </form>
    `

    row.appendChild(divCol)

    document.querySelector('.ins').addEventListener('click', function(e){
        e.preventDefault();
        wrapper.classList.add('rotate-to-auth');

        inscription(rowInsc)
    
        setTimeout(()=>{
            document.querySelector('.divCol').remove()
        }, 1000) 
    });
}

function inscription(row){
    const divCol2 = document.createElement('div')
    divCol2.classList.add('col-lg-6', 'text', 'divCol2')
    divCol2.innerHTML = `
    <div class="logo px-4">
        <img src="images/indrive-icon-logo.png" alt="">
    </div>
    <div class="titre px-4">
        <h1>Inscrivez-vous</h1>
        <p>Choisissez votre prix</p>
    </div>
    <form method="post" class="px-4" action="{{ route('register') }}">
        @csrf
        <input type="text"  placeholder="Nom" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
        @error('name', 'register')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
        <input type="text"  placeholder="Numéro de téléphone" name="numero_phone" value="{{ old('numero_phone') }}" class="form-control @error('numero_phone') is-invalid @enderror">
        @error('numero_phone', 'register')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
        {{-- Stand By --}}
        <select name="role" id="" class="form-control">
            <option value="" style="color: grey">---Rôle---</option>
            <option value="Passager">Passager</option>
            <option value="Chauffeur">Chauffeur</option>
        </select>
        @error('role', 'register')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
        <input type="password" placeholder="Mots de passe" name="password" class="form-control @error('password') is-invalid @enderror">
        @error('password', 'register')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
        <input type="password"  placeholder="Vérifier mots de passe" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
        @error('password_confirmation', 'register')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
        
        <input type="submit" value="S'inscrire" class="btn btn-dark w-50 d-block mx-auto inscri my-4">
        <p>Déja une compte? <a href="#" class="conn" id="show-login">Se connecter</a></p>
    </form>
    `

    row.prepend(divCol2)

    document.querySelector('.conn').addEventListener('click', function(e){
        e.preventDefault();
        wrapper.classList.remove('rotate-to-auth');
    
        connexion(rowConnexion)

        setTimeout(()=>{
            document.querySelector('.divCol2').remove()
        }, 1000) 

    });

    
}