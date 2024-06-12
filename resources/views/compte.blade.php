@extends('layouts.layout')

@section('title', 'Compte')

@section('content')
<div class="container" x-data="{ showRegister: false }">
    @if(session('msg') == 'register')
    <div>
        Compte créé avec succès, merci d'attendre validation de l'administrateur !
    </div>
    @elseif(session('msg') == 'off')
    <div>
        Merci d'attendre validation de l'administrateur !
    </div>
    @elseif(session('msg') == 'iuser')
    <div>
        Mauvais Email/Password !
    </div>
    @elseif(session('msg') == 'logout')
    <div class="alert alert-success text-center" role="alert">
        Déconnexion réussie !
    </div>
    @endif

    <div class="form-container">
        <!-- Formulaire de connexion -->
        <div x-show="!showRegister">
            <h1>Connexion</h1>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <input type="email" name="email" placeholder="Saisir votre email" required />
                <input type="password" name="mot_de_passe" placeholder="Mot de passe" required />
                <button type="submit">Se connecter</button>
            </form>
            <p>Pas encore de compte ? <button @click="showRegister = true"
                    class="text-blue-500 underline">S'inscrire</button></p>
        </div>

        <!-- Formulaire d'inscription -->
        <div x-show="showRegister" style="display: none;">
            <h1>Se créer un compte</h1>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <input type="text" name="prenom" placeholder="Prénom" required />
                <input type="text" name="nom" placeholder="Nom" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="mot_de_passe" placeholder="Mot de passe" required />
                <input type="password" name="mot_de_passe_confirmation" placeholder="Confirmer le mot de passe"
                    required />
                <input type="text" name="adresse" placeholder="Adresse" required />
                <input type="text" name="ville" placeholder="Ville" required />
                <input type="text" name="code_postal" placeholder="Code postal" required />
                <input type="text" name="complement" placeholder="Complément" />
                <select name="statut" required>
                    <option value="utilisateur">Utilisateur</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit">S'inscrire</button>
            </form>
            <p>Déjà un compte ? <button @click="showRegister = false" class="text-blue-500 underline">Se
                    connecter</button></p>
        </div>
    </div>
</div>
@endsection