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

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
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

            <div class="reviews" style="background-color:#161b2a">
                <h2>Avis (<span x-text="reviews.length"></span>)</h2>
                <template x-for="review in reviews" :key="review.id">
                    <div class="review">
                        <h3 x-text="review.name"></h3>
                        <div class="stars">
                            <template x-for="star in 5">
                                <span :class="{'filled': star <= review.rating}">&#9733;</span>
                            </template>
                        </div>
                        <p x-text="review.text"></p>
                    </div>
                </template>
            </div>
        <script src="script.js"></script>
    </div>
        
</body>
</html>

@endsection('content')
