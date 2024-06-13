@extends('layouts.layout')

@section('title', 'POLYMEDIA - Contact')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact</title>
    <link rel="stylesheet" href="./style/contact.css">
    <script src="./js/contact.js" defer></script>
</head>

<div id="titre">
    <h2 id="titre-texte">Formulaire de contact</h2>
    <div id="ligne-rouge"></div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form id="section-formulaire" action="{{ route('contact.send') }}" method="post">
    @csrf
    <p id="description">Polymedia est à votre service ! <br> Contactez nous pour toute demande d'information ou d'aide
    </p>
    <section id="champs">
        <div id="nom">
            <p id="titre-nom" class="titre">Nom</p>
            <div id="inputs-nom" class="inputs">
                <input id="input-prenom" class="input-half" type="text" placeholder="Prénom" name="prenom" required>
                <input id="input-nom" class="input-half" type="text" placeholder="Nom" name="nom" required>
            </div>
        </div>
        <div id="contact">
            <p id="titre-contact" class="titre">Contact</p>
            <div id="inputs-contact" class="inputs">
                <input type="email" class="input-half" name="email" id="input-email" placeholder="Email" required>
                <input type="text" class="input-half" id="input-telephone" name="telephone" placeholder="Téléphone">
            </div>
        </div>
        <div id="textbox">
            <p id="titre-contact" class="titre">Question</p>
            <div id="inputs-question" class="inputs">
                <input type="text" name="obj" placeholder="Objet" required>
                <textarea class="input-full" name="mess" id="input-question" placeholder="Ecrivez votre question ici"
                    required></textarea>
            </div>
        </div>
    </section>
    <input type="submit" id="contactform-submit">
</form>
@endsection