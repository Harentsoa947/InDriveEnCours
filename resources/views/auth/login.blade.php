@extends('layouts.master')

@section('title', 'Connexion')

@section('content')


<div class="wrapper">
    <div class="container">
        <div class="box el1">
            <div class="row rowConn">
                <div class="col-lg-6 im p-0 order-2 order-lg-1">
                    <img src="images/paul-hanaoka-D-qq7W751vs-unsplash.jpg" alt="">
                </div>
                <div class="col-lg-6 text ps-4 order-1 order-lg-2">
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
                        <input type="submit" value="Se connecter" class="btn btn-dark w-50 d-block mx-auto inscri my-4">
                        <p class="insc">
                            Pas encore de compte? 
                            <a href="{{ route('register') }}" class="ins" id="show-register">S'inscrire</a>
                        </p>
                    </form>
                </div>
                
            </div>
        </div>
        
    </div>
</div>
@endsection