@extends('layouts.layout')

@section('content')

<head>
    <title>Catalogue</title>
    <link rel="stylesheet" href="./style/catalogue.css">
    <script src="./js/getAllBooks.js"></script>
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


    <div class="book-list" x-data="books" x-init="fetchBooks">
        <template x-for="book in books">
            <template x-if="book.imgUrl">
                <div class="book-item">
                    <img class="book-img" :src="'./storage/' + book . imgUrl" alt="Image du livre">
                    <div class="book-title" x-text="book.titre"></div>
                    <div class="book-year" x-text="book.annee"></div>
                </div>
            </template>
        </template>
    </div>
</main>


@endsection('content')