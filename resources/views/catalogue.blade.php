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
                <input type="text" placeholder="Rechercher..." x-model="searchQuery"
                    @keydown.enter="fetchFilteredRessources">
                <template x-if="searchQuery">
                    <img class="clear-icon" src="./storage/clear-icon.png" alt="Clear" @click="clearSearch">
                </template>
            </div>

            <div class="search-button" @click="fetchFilteredRessources">
                <img src="./storage/search-icon.svg" alt="Search">
            </div>
            <img class="filter-icon" src="./storage/filter-icon.svg" alt="Filtres" @click="showFilters = true">
        </div>
        <div class="filter-container" x-show="showFilters" @click.away="showFilters = false">
            <div class="generic-filters">
                <div class="filter-title">Filtres</div>
                <div class="filter-options">
                    <div class="filter-option">
                        <select id="genre">
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
                        <select id="status">
                            <option value="" disabled selected>Disponibilité</option>
                            <option value="disponible">Disponible</option>
                            <option value="indisponible">Indisponible</option>
                        </select>
                    </div>
                    <div class="filter-option">
                        <input type="number" id="year" min="1500" max="2025" placeholder="Année">
                    </div>
                </div>
            </div>
            <div class="specific-filters">
                <div class="book-specific">
                    <div class="filter-subtitle">Spécifique aux livres</div>
                    <div class="filter-options-specific">
                        <div class="filter-option">
                            <input type="text" id="author" placeholder="Auteur">
                        </div>
                        <div class="filter-option">
                            <select id="editeur">
                                <option value="" disabled selected>Maison d'édition</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="movie-specific">
                    <div class="filter-subtitle">Spécifique aux films</div>
                    <div class="filter-options-specific">
                        <div class="filter-option">
                            <input type="text" id="actor" placeholder="Acteur">
                        </div>
                        <div class="filter-option">
                            <input type="text" id="director" placeholder="Réalisateur">
                        </div>
                    </div>
                </div>
            </div>

            <img class="close-icon" src="./storage/clear-icon.png" @click="showFilters = false">
        </div>
    </div>

    <div class="ressource-list">
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

<script>
    function catalogue() {
        return {
            searchQuery: '',
            ressources: [],
            filteredRessources: [],
            async fetchAllRessources() {
                try {
                    const response = await fetch('/api/catalogue'); // Adjust the URL to match your API endpoint
                    this.ressources = await response.json();
                    this.filteredRessources = this.ressources;
                } catch (error) {
                    console.error('Error fetching ressources:', error);
                }
            },
            async fetchFilteredRessources() {
                try {
                    const response = await fetch('/api/catalogue?query=' + this.searchQuery); // Adjust the URL to match your API endpoint
                    this.filteredRessources = await response.json();
                } catch (error) {
                    console.error('Error fetching filtered ressources:', error);
                }
            }
        }
    }
</script>

@endsection