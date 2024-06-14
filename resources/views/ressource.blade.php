@extends('layouts.layout')

@section('title', 'POLYMEDIA - Ressource')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/getRessource.js"></script>
    <link rel="stylesheet" href="./style/ressource.css">
</head>

<body>

    <div id="ctn-ressource" class="container" x-data="ressource" x-init="fetchRessource">
        <div class="movie-info">
            <img :src="'./storage/' + ressource . imgUrl" :alt="ressource . titre">
            <div class="details">
                <h1 id="titre-ressource" x-text="ressource.titre"></h1>
                <div id="section-auteur">
                    <img id="icone-auteur" src="./storage/icone-auteur.svg" alt="">
                    <p id="auteur-ressource"
                        x-text="ressource.isbn ? ressource.auteur_nom_complet : ressource.realisateur_nom_complet"></p>
                </div>
                <div style="width:350px; background-color:#010423; height:2px; margin:20px 0;"></div>
                <p id="type-ressource"
                    x-text="(ressource.isbn ? 'Livre'+' - '+ressource.annee : 'Film' +' - '+ressource.annee)"></p>
                <p id="description-ressource" x-text="ressource.description"></p>
                <div id="disponible">
                    <div id="icone-disponible"
                        x-bind:style="{ backgroundColor: ressource.statut === 'disponible' ? 'green' : 'red' }"></div>
                    <p class="available-text" x-text="'Cette ressource est ' + ressource.statut"></p>
                </div>
                <div id="submitInputResa">
                    <template x-if="!isReservationPossible">
                        <button class="btn-reserve-disabled">Réservation impossible</button>
                    </template>
                    <template x-if="isReservationPossible">
                        <button @click="makeReservation" class="btn-reserve">Réserver</button>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <img src="./storage/wave.png" alt="" style="width:100%">

    <div id="section-avis" x-data="ressource">

        <div class="review-form" x-show="isUserLoggedIn" x-init="checkUserLoggedIn">
            <h2>Donnez votre avis</h2>
            <textarea x-model="newReview.commentaire" placeholder="Écrivez votre avis ici..."></textarea>
            <input type="number" x-model.number="newReview.note" name="note" id="noteInput" min="1" max="5" step="0.1"
                style="width:80px;" placeholder="Note /5">
            <button @click="submitReview">Envoyer</button>
        </div>



        <div class="liste-avis" x-init="fetchRatings()">
            <h2>Avis (<span x-text="numberOfRatings"></span>)</h2>
            <div class="avis">
                <template x-if="ratings.length > 0">
                    <template x-for="rating in ratings" :key="rating . id">
                        <div class="ressource-title">
                            <p style="margin-bottom:10px;"><span x-text="rating.prenom +' '"
                                    style="font-family:'stara-bold'; font-size:18px;"></span><span x-text="rating.nom"
                                    style="font-family:'stara-bold'; font-size:18px; margin-right:10px;"></span><span
                                    x-text="rating.note + '/5'"
                                    style="font-family:'stara-bold'; font-size:18px;"></span></p>
                            <p><span x-text="rating.commentaire || 'Pas de commentaire disponible'"></span></p>
                        </div>
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