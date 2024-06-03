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
    <div x-data="books" x-init="fetchBooks">
        <h1 class="page-title">Catalogue</h1>
        <div class="title-underline"></div>
        <ul>
            <template x-for="book in books">
                <div>
                    <div x-text="book.titre"></div>
                    <div x-text="book.annee"></div>
                    <img :src="`{{ asset('storage') }}/${book . imgUrl}`" alt="Book Image">
                </div>
            </template>
        </ul>
    </div>

</body>

</html>