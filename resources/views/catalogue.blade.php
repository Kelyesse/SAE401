<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="./js/getAllBooks.js"></script>
</head>

<body>
    <div x-data="books" x-init="fetchBooks">
        <h1>Catalogue de Livres</h1>
        <ul>
            <template x-for="book in books">
                <div>
                    <li x-text="book.titre"></li>
                    <li x-text="book.annee"></li>
                </div>
            </template>
        </ul>
    </div>

</body>

</html>