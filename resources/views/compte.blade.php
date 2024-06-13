@extends('layouts.layout')

@section('title', 'Compte')

@section('content')

<head>
    <title>Catalogue</title>
    <link rel="stylesheet" href="./style/auth.css">
    <script src="./js/auth.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<div class="auth-container">
    <div class="form-container" x-data="{ showRegister: false }">
        @if(session('msg') == 'register')
        <div class="alert alert-success">
            Compte créé avec succès, merci d'attendre validation de l'administrateur !
        </div>
        @elseif(session('msg') == 'off')
        <div class="alert alert-warning">
            Merci d'attendre validation de l'administrateur !
        </div>
        @elseif(session('msg') == 'iuser')
        <div class="alert alert-danger">
            Mauvais Email/Password !
        </div>
        @elseif(session('msg') == 'logout')
        <div class="alert alert-success text-center" role="alert">
            Déconnexion réussie !
        </div>
        @endif

        <div x-show="!showRegister">
            <h1>Connexion</h1>
            <h2>Identifiants</h2>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <input type="email" name="email" placeholder="Adresse mail" required />
                <div class="password-container">
                    <input type="password" name="mot_de_passe" placeholder="Mot de passe" required
                        id="password-login" />
                    <i class="far fa-eye" id="toggle-password-login"></i>
                </div>
                <button type="submit">Connexion</button>
            </form>
            <p>Première visite sur Polymedia ? <a href="#" @click="showRegister = true">Inscription</a></p>
        </div>

        <div x-show="showRegister" style="display: none;">
            <h1>Inscription</h1>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <input type="text" name="prenom" placeholder="Prénom" required />
                <input type="text" name="nom" placeholder="Nom" required />
                <input type="email" name="email" placeholder="Email" required />
                <div class="password-container">
                    <input type="password" name="mot_de_passe" placeholder="Mot de passe" required
                        id="password-register" />
                    <i class="far fa-eye" id="toggle-password-register"></i>
                </div>
                <div class="password-container">
                    <input type="password" name="mot_de_passe_confirmation" placeholder="Confirmer le mot de passe"
                        required id="password-confirm" />
                    <i class="far fa-eye" id="toggle-password-confirm"></i>
                </div>
                <input type="text" name="adresse" placeholder="Adresse" required />
                <input type="text" name="ville" placeholder="Ville" required />
                <input type="text" name="code_postal" placeholder="Code postal" required />
                <input type="text" name="complement" placeholder="Complément" />
                <button type="submit">S'inscrire</button>
            </form>
            <p>Déjà un compte ? <a href="#" @click="showRegister = false">Connexion</a></p>
        </div>
    </div>
</div>
@endsection