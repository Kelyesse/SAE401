@extends('layouts.layout')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dune 2 Review</title>
    <script src="./js/getRessource.js"></script>
    <link rel="stylesheet" href="./style/ressource.css">
</head>
<body>

<div id="ctn-ressource" class="container" x-data="ressource" x-init="fetchRessource">
    <div class="movie-info">
        <img :src="'./storage/' + ressource.imgUrl" :alt="ressource.titre">
        <div class="details">
            <h1 id="titre-ressource" x-text="ressource.titre"></h1>
            <div id="section-auteur">
                <img id="icone-auteur" src="./storage/icone-auteur.svg" alt="">
                <p id="auteur-ressource" x-text="ressource.isbn ? ressource.auteur_nom_complet : ressource.realisateur_nom_complet"></p>
            </div>
            <div style="width:350px; background-color:#010423; height:2px; margin:20px 0;"></div>
            <p id="type-ressource" x-text="(ressource.isbn ? 'Livre'+' - '+ressource.annee : 'Film' +' - '+ressource.annee)"></p>
            <p id="description-ressource" x-text="ressource.description"></p>
            <div id="disponible">
                <div id="icone-disponible" x-bind:style="{ backgroundColor: ressource.statut === 'disponible' ? 'green' : 'red' }"></div>
                <p class="available-text" x-text="'Cette ressource est ' + ressource.statut"></p>
            </div>
            <button class="btn-reserve">Réserver</button>
        </div>
    </div>
</div>

<img src="./storage/wave.png" alt="" style="width:100%">

<div id="section-avis">

    <div class="review-form">
        <h2>Donnez votre avis</h2>
        <textarea x-model="newReview.text" placeholder="Écrivez votre avis ici"></textarea>
        <button @click="submitReview()">Envoyer</button>
    </div>

    <div class="liste-avis" x-data="ressource" x-init="fetchRatings()">
        <h2>Avis (<span x-text="numberOfRatings"></span>)</h2>
        <div class="avis">
            <template x-if="ratings.length > 0">
                <template x-for="rating in ratings" :key="rating.id">
                    <div class="ressource-title" x-text="rating.commentaire || 'Pas de commentaire disponible'"></div>
                </template>
            </template>
            <template x-if="ratings.length === 0">
                <p>Aucun avis disponible.</p>
            </template>
        </div>
    </div>

</div>

</body>
</html>

@endsection('content')
