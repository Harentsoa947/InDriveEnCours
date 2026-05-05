@extends('layouts.master')

@section('title', 'Connexion/Inscription')

@section('content')

<div class="wrapper">
    <div class="container">
        <div class="box el1">
            <div class="row">
                <div class="col-lg-6 im p-0 order-2 order-lg-1">
                    <img src="images/paul-hanaoka-D-qq7W751vs-unsplash.jpg" alt="">
                </div>
                <div class="col-lg-6 text  ps-4 order-1 order-lg-2">
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
                        @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                        <input type="password" placeholder="Mots de passe" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                        {{-- <select name="" id="" class="form-control">
                            <option value="" style="color: grey">---Passagier ou Chauffeur---</option>
                            <option value="Passagier">Passagier</option>
                            <option value="chauf">Chauffeur</option>
                        </select> --}}
                        
                        <input type="submit" value="Se connecter" class="btn btn-dark w-50 d-block mx-auto inscri my-4">
                        <p class="insc">
                            Pas encore de compte? 
                            <a href="#" class="ins" id="show-register">S'inscrire</a>
                        </p>
                    </form>
                </div>
                
            </div>
        </div>
        <div class="box el2">
            <div class="row">
                <div class="col-lg-6 text ">
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
                        @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                        <input type="text"  placeholder="Numéro de téléphone" name="numero_phone" value="{{ old('numero_phone') }}" class="form-control @error('numero_phone') is-invalid @enderror">
                        @error('numero_phone')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                        {{-- Stand By --}}
                        <select name="role" id="" class="form-control">
                            <option value="" style="color: grey">---Rôle---</option>
                            <option value="Passager">Passager</option>
                            <option value="Chauffeur">Chauffeur</option>
                        </select>
                        @error('role')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                        <input type="password" placeholder="Mots de passe" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                        <input type="password"  placeholder="Vérifier mots de passe" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                        
                        <input type="submit" value="S'inscrire" class="btn btn-dark w-50 d-block mx-auto inscri my-4">
                        <p>Déja une compte? <a href="#" class="conn" id="show-login">Se connecter</a></p>
                    </form>
                </div>
                <div class="col-lg-6 im d-none d-lg-block p-0">
                    <img src="images/paul-hanaoka-D-qq7W751vs-unsplash.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection