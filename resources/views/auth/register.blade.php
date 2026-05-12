@extends('layouts.master')

@section('title', 'Inscription')

@section('content')

{{-- @dd($typeV) --}}

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

                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                        <input type="text"  placeholder="Nom" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                        <input type="text"  placeholder="Numéro de téléphone" name="numero_phone" value="{{ old('numero_phone') }}" class="form-control @error('numero_phone') is-invalid @enderror">
                        @error('numero_phone')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                        {{-- Stand By --}}
                        <select name="role" id="role" class="form-control">
                            <option value="" style="color: grey">---Rôle---</option>
                            <option value="Passager" @selected(old('role') === 'Passager')>Passager</option>
                            <option value="Chauffeur" @selected(old('role') === 'Chauffeur')>Chauffeur</option>
                        </select>

                        <div class="forChauffeur">
                            <fieldset class="mt-2" style="border: 1px solid #728f2c; border-radius: 8px; padding: 10px;">
                                <legend style="padding: 0 5px; font-size: 14px; color: #666;">A propos du voiture</legend>
                                <input type="text" name="marque_voiture" class="form-control @error('marque_voiture') is-invalid @enderror" placeholder="Marque du voiture"  value="{{ old('marc') }}">
                                @error('marque_voiture')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                                <div class="my-4 mx-auto">
                                    <label for="" class="me-5">Voiture éléctrique ou pas ?</label>
                                    <input type="radio" name="electrique" id="oui" value="true" class="form-check-input @error('marque_voiture') is-invalid @enderror" @checked(old('electrique') === 'true')>
                                    <label for="oui">Oui</label>
                                    <input type="radio" name="electrique" id="non" value="false" class="form-check-input @error('marque_voiture') is-invalid @enderror" @checked(old('electrique') === 'false')>
                                    <label for="non">Non</label>
                                    @error('marque_voiture')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <select name="typeV" id="" class="form-control @error('typeV') is-invalid @enderror">
                                    <option value="">---Votre type voiture---</option>
                                    @foreach ($typeV as $voiture)
                                        <option value="{{ $voiture->id }}">{{ $voiture->type }} ({{ $voiture->description_voiture }})</option>
                                    @endforeach
                                </select>
                                @error('typeV')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </fieldset>
                        </div>
                        
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