@extends('layouts.layout')

@section('title', 'Gestion de la Bibliothèque')

@section('content')

<head>
    <link rel="stylesheet" href="./style/bibliothecaire.css">
    <script src="./js/bibliothecaire.js"></script>
</head>

<main class="container" x-data="bibliothecaire">
    <!-- Réservations en retard -->
    <section class="reservations-actives">
        <div class="title">
            <div class="page-title">Réservation actives</div>
            <div class="title-underline"></div>
        </div>
        <div class="carousel">
            <div class="ressource-container">
                <template x-for="reservation in reservations">
                    <a :href="'./ressource?' + (reservation . ressource_details . isbn ? 'isbn=' + reservation . ressource_details . isbn : 'ian=' + reservation . ressource_details . ian) + '&id=' + reservation . ressource_details . id" class="ressource-item">
                        <img class="ressource-img" :src="'./storage/' + reservation . ressource_details . imgUrl"
                            alt="Image de la ressource">
                        <div class="ressource-title" x-text="reservation.ressource_details.titre"></div>
                        <div class="ressource-remaining" x-text="getRemainingTime(reservation.date_retour_prevue)">
                        </div>
                        <div class="ressource-owner">
                            <div class="ressource-owner-name" x-text="reservation.utilisateur_details.prenom">
                            </div>
                            <div class="ressource-owner-lastname" x-text="reservation.utilisateur_details.nom">
                            </div>
                        </div>
                    </a>
                </template>
            </div>
        </div>
    </section>

    <!-- Inventaire des ressources -->
    <section class="inventaire-ressources">
        <div class="title">
            <div class="page-title">Registre des ressources</div>
            <div class="title-underline"></div>
        </div>
        <div class="search-bar">
            <input type="text" x-model="filters.searchQuery" placeholder="Rechercher une ressource...">
            <button @click="fetchFilteredResources()">Rechercher</button>
            <template x-if="filters.searchQuery">
                <img class="clear-icon" src="./storage/clear-icon.png" alt="Clear" @click="clearSearch">
            </template>
        </div>
        <div class="resource-list">
            <template x-for="resource in filteredResources">
                <div class="resource-item">
                    <div class="resource-title" x-text="resource.titre"></div>
                    <div class="resource-year" x-text="resource.annee"></div>
                    <div class="resource-stock" x-text="'Stock: ' + resource.nombre_exemplaires"></div>
                </div>
            </template>
        </div>
    </section>

    <!-- Ajout de ressources -->
    <section class="ajout-ressources">
        <div class="title">
            <div class="page-title">Ajout de ressources</div>
            <div class="title-underline"></div>
        </div>
        <div class="form-container">
            <form @submit.prevent="addResource()">
                <select x-model="newResource.type">
                    <option value="livre">Livre</option>
                    <option value="dvd">DVD</option>
                </select>
                <input type="text" x-model="newResource.titre" placeholder="Titre">
                <template x-if="newResource.type === 'livre'">
                    <div class="specific-fields">
                        <input type="text" x-model="newResource.auteur" placeholder="Nom de l'auteur">
                        <select x-model="newResource.editeur">
                            <option value="" disabled selected>Sélectionnez un éditeur</option>
                            <template x-for="editeur in editeurs" :key="editeur . id">
                                <option x-bind:value="editeur.nom" x-text="editeur.nom"></option>
                            </template>
                            <input type="text" x-model="newResource.isbn" placeholder="ISBN">
                        </select>
                        <input type="number" x-model="newResource.nombre_pages" placeholder="Nombre de pages">
                    </div>
                </template>
                <template x-if="newResource.type === 'dvd'">
                    <div class="specific-fields">
                        <input type="text" x-model="newResource.acteur" placeholder="Acteur">
                        <input type="text" x-model="newResource.realisateur" placeholder="Réalisateur">
                        <input type="text" x-model="newResource.ian" placeholder="IAN">
                        <input type="number" x-model="newResource.duree" placeholder="Durée (en minutes)">
                    </div>
                </template>

                <select x-model="newResource.genre">
                    <option value="" disabled selected>Sélectionnez un genre</option>
                    <option value="Action">Action</option>
                    <option value="Drame">Drame</option>
                    <option value="Romance">Romance</option>
                    <option value="Science-fiction">Science-fiction</option>
                    <option value="Mystère">Mystère</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Fantaisie">Fantaisie</option>
                    <option value="Aventure">Aventure</option>
                    <option value="Horreur">Horreur</option>
                    <option value="Dystopie">Dystopie</option>
                    <option value="Humour">Humour</option>
                    <option value="Jeunesse">Jeunesse</option>
                    <option value="Biographie">Biographie</option>
                    <option value="Histoire">Histoire</option>
                    <option value="Sciences naturelles">Sciences naturelles</option>
                    <option value="Sciences sociales">Sciences sociales</option>
                    <option value="Psychologie">Psychologie</option>
                    <option value="Économie">Économie</option>
                    <option value="Politique">Politique</option>
                    <option value="Religion">Religion</option>
                </select>
                <select x-model="newResource.langue">
                    <option value="" disabled selected>Sélectionnez une langue</option>
                    <option value="fr">Français</option>
                    <option value="en">Anglais</option>
                    <option value="de">Allemand</option>
                    <option value="es">Espagnol</option>
                    <option value="it">Italien</option>
                </select>
                <input type="number" x-model="newResource.annee" placeholder="Année">
                <input type="number" x-model="newResource.nombre_exemplaires" placeholder="Quantité">
                <textarea class="description-input" x-model="newResource.description"
                    placeholder="Description"></textarea>
                <input type="file" @change="handleFileUpload($event)">
                <button type="submit">Ajouter au catalogue</button>
            </form>
        </div>

    </section>
</main>

@endsection