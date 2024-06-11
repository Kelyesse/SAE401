@extends('layouts.layout')

@section('content')

<head>
    <title>Catalogue</title>
    <link rel="stylesheet" href="./style/catalogue.css">
    <script src="./js/getRessources.js"></script>
</head>

<main class="container" x-data="ressources" x-init="fetchAllRessources">
    <div class="search-section">
        <div class="title">
            <div class="page-title">Catalogue</div>
            <div class="title-underline"></div>
        </div>
        <div class="search-bar">
            <div class="input-search-bar">
                <input type="text" placeholder="Rechercher..." x-model="filters.searchQuery"
                    @keydown.enter="fetchFilteredRessources">
                <template x-if="filters.searchQuery">
                    <img class="clear-icon" src="./storage/clear-icon.png" alt="Clear" @click="clearSearch">
                </template>
            </div>

            <div class="search-button" @click="fetchFilteredRessources">
                <img src="./storage/search-icon.svg" alt="Search">
            </div>
            <img class="filter-icon" src="./storage/filter-icon.svg" alt="Filtres" @click="fetchFilterOptions">
        </div>
        <div class="filter-container" x-show="showFilters" @click.away="showFilters = false">
            <div class="generic-filters">
                <div class="filter-title">Filtres</div>
                <div class="filter-options">
                    <div class="filter-option">
                        <select id="genre" x-model="filters.genre">
                            <option value="" disabled selected>Genre</option>
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
                    </div>
                    <div class="filter-option">
                        <select id="year" x-model="filters.annee">
                            <option value="" disabled selected>Année</option>
                            <template x-for="annee in filterOptions.annees">
                                <option :value="annee" x-text="annee"></option>
                            </template>
                        </select>
                    </div>
                    <div class="filter-option status-filter">
                        <label for="disponibilite">Ressources disponibles</label>
                        <input x-model="filters.isAvailable" type="checkbox" id="disponibilite">
                    </div>
                </div>
            </div>
            <div class="specific-filters">
                <div class="book-specific">
                    <div class="filter-subtitle">Spécifique aux livres</div>
                    <div class="filter-options-specific">
                        <div class="filter-option">
                            <select id="auteur" x-model="filters.auteur">
                                <option value="" disabled selected>Auteur</option>
                                <template x-for="auteur in filterOptions.auteurs" :key="auteur . id">
                                    <option :value="auteur . id" x-text="auteur.nom"></option>
                                </template>
                            </select>
                        </div>
                        <div class="filter-option">
                            <select id="editeur" x-model="filters.editeur">
                                <option value="" disabled selected>Maison d'édition</option>
                                <template x-for="editeur in filterOptions.editeurs" :key="editeur . id">
                                    <option :value="editeur . id" x-text="editeur.nom"></option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="movie-specific">
                    <div class="filter-subtitle">Spécifique aux films</div>
                    <div class="filter-options-specific">
                        <div class="filter-option">
                            <select id="acteur" x-model="filters.acteur">
                                <option value="" disabled selected>Acteur</option>
                                <template x-for="acteur in filterOptions.acteurs" :key="acteur . id">
                                    <option :value="acteur . id" x-text="acteur.nom"></option>
                                </template>
                            </select>
                        </div>
                        <div class="filter-option">
                            <select id="realisateur" x-model="filters.realisateur">
                                <option value="" disabled selected>Réalisateur</option>
                                <template x-for="realisateur in filterOptions.realisateurs" :key="realisateur . id">
                                    <option :value="realisateur . id" x-text="realisateur.nom"></option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <img class="close-icon" src="./storage/clear-icon.png" @click="showFilters = false">
            <div @click="clearSearch" class="clear-filters">Effacer</div>
            <button @click="fetchFilteredRessources" class="apply-filters-button">Valider</button>
        </div>
    </div>
    <div class="active-filters-container" x-show="Object.values(filters).some(value => value)">
        <template x-if="Object.values(filters).some(value => value)">
            <div class="filter-message">Filtres actifs : </div>
        </template>
        <template x-for="[key, value] of Object.entries(filters)" :key="key">
            <template x-if="value">
                <div class="active-filter"
                    x-text="key === 'isAvailable' ? 'Disponibilité' : (key === 'searchQuery' ? 'Recherche' : key)">
                </div>
            </template>
        </template>
        <img class="clear-icon" src="./storage/clear-icon.png" alt="Clear" @click="clearSearch">
    </div>

    <div class="ressource-list">
        <template x-if="isResponseEmpty">
            <div class="no-ressources-message">
                Aucune ressource trouvée dans notre catalogue avec ces critères de recherche...
                <div @click="clearSearch" class="delete-filters-button">Supprimer les filtres</div>
            </div>
        </template>
        <template x-for="ressource in filteredRessources">
            <template x-if="ressource.imgUrl">
                <a :href="'./ressource?' + (ressource . isbn ? 'isbn=' + ressource . isbn : 'ian=' + ressource . ian) + '&id=' + ressource . id" class="ressource-item">
                    <img class="ressource-img" :src="'./storage/' + ressource . imgUrl" alt="Image du livre">
                    <div class="ressource-title" x-text="ressource.titre"></div>
                    <div class="ressource-year" x-text="ressource.annee"></div>
                </a>
            </template>
        </template>
    </div>
</main>


@endsection