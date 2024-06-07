@extends('layouts.layout')

@section('content')

<head>
    <title>Catalogue</title>
    <link rel="stylesheet" href="./style/catalogue.css">
    <script src="./js/getAllRessources.js"></script>
</head>

<main class="container">
    <div class="search-section">

        <div class="title">
            <div class="page-title">Catalogue</div>
            <div class="title-underline"></div>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Rechercher...">
            <div class="search-button"><img src="./storage/search-icon.svg" alt="Search"></div>
            <img class="filter-icon" src="./storage/filter-icon.svg" alt="Filter">
        </div>
    </div>


    <div class="ressource-list" x-data="ressources" x-init="fetchAllRessources">
        <template x-for="ressource in ressources">
            <template x-if="ressource.imgUrl">
                <a :href="'./ressource?' + (ressource . isbn ? 'isbn=' + ressource . isbn : 'ian=' + ressource . ian)"
                    class="ressource-item">
                    <img class="ressource-img" :src="'./storage/' + ressource . imgUrl" alt="Image du livre">
                    <div class="ressource-title" x-text="ressource.titre"></div>
                    <div class="ressource-year" x-text="ressource.annee"></div>
                </a>
            </template>
        </template>
    </div>
</main>


@endsection('content')