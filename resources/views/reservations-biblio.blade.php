@extends('layouts.layout')

@section('title', 'Gestion de la Bibliothèque')

@section('content')

<head>
    <link rel="stylesheet" href="./style/bibliothecaire.css">
    <script src="./js/bibliothecaire.js"></script>
</head>

<main class="container" x-data="bibliothecaire" x-init="init()">
    <!-- Réservations en retard -->
    <section class="reservations-en-retard">
        <h2>Réservations en retard</h2>
        <div class="carousel">
            <template x-for="reservation in $store.bibliothecaireStore.reservations" :key="reservation.id">
                <div class="reservation-item">
                    <img :src="'/storage/' + reservation.ressource.imgUrl" alt="" class="reservation-img">
                    <div class="reservation-title" x-text="reservation.ressource.titre"></div>
                    <div class="reservation-remaining"
                        x-text="$store.bibliothecaireStore.getRemainingTime(reservation.date_retour_prevue)"></div>
                    <div class="reservation-user" x-text="reservation.utilisateur.nom"></div>
                </div>
            </template>
        </div>
    </section>

    <!-- Inventaire des ressources -->
    <section class="inventaire-ressources">
        <h2>Registre des ressources</h2>
        <div class="search-bar">
            <input type="text" x-model="$store.bibliothecaireStore.filters.searchQuery"
                placeholder="Rechercher une ressource...">
            <button @click="$store.bibliothecaireStore.fetchFilteredResources()">Rechercher</button>
        </div>
        <div class="resource-list">
            <template x-for="resource in $store.bibliothecaireStore.filteredResources" :key="resource.id">
                <div class="resource-item">
                    <div class="resource-title" x-text="resource.titre"></div>
                    <div class="resource-author" x-text="resource.auteur ? resource.auteur.nom : 'N/A'"></div>
                    <div class="resource-year" x-text="resource.annee"></div>
                    <div class="resource-stock" x-text="'Stock: ' + resource.nombre_exemplaires"></div>
                </div>
            </template>
        </div>
    </section>

    <!-- Ajout de ressources -->
    <section class="ajout-ressources">
        <h2>Ajout de ressources</h2>
        <div class="form-container">
            <form @submit.prevent="$store.bibliothecaireStore.addResource()">
                <select x-model="$store.bibliothecaireStore.newResource.type">
                    <option value="livre">Livre</option>
                    <option value="dvd">DVD</option>
                </select>
                <input type="text" x-model="$store.bibliothecaireStore.newResource.titre" placeholder="Titre">
                <input type="text" x-model="$store.bibliothecaireStore.newResource.auteur" placeholder="Auteur">
                <input type="text" x-model="$store.bibliothecaireStore.newResource.editeur" placeholder="Éditeur">
                <input type="number" x-model="$store.bibliothecaireStore.newResource.annee" placeholder="Année">
                <input type="number" x-model="$store.bibliothecaireStore.newResource.stock" placeholder="Stock">
                <button type="submit">Ajouter au catalogue</button>
            </form>
        </div>
    </section>
</main>

@endsection