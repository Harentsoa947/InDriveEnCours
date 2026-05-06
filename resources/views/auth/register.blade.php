@extends('layouts.master')

@section('title', 'Inscription')

@section('content')


<div class="wrapper">
    <div class="container">
        <div class="box el2 ">
            <div class="row rowInsc">
                <div class="col-lg-6 text">
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
                        <p>Déja une compte? <a href="{{ route('login') }}" class="conn" id="show-login">Se connecter</a></p>
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