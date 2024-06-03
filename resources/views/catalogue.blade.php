<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    <link rel="stylesheet" href="./style/catalogue.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="./js/getAllBooks.js"></script>
</head>

<body>
    <main class="container">
        <h1 class="page-title">Catalogue</h1>
        <div class="title-underline"></div>

        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" placeholder="Rechercher...">
            <button><img src="./images/search-icon.png" alt="Search"></button>
            <button><img src="./images/filter-icon.png" alt="Filter"></button>
        </div>

        <!-- Book List -->
        <div class="book-list" x-data="books" x-init="fetchBooks">
            <template x-for="book in books">
                <template x-if="book.imgUrl">
                    <div class="book-item">
                        <img :src="'./storage/' + book . imgUrl" alt="Image du livre">
                        <div class="book-title" x-text="book.titre"></div>
                        <div class="book-year" x-text="book.annee"></div>
                    </div>
                </template>
            </template>
        </div>
    </main>
</body>

</html>