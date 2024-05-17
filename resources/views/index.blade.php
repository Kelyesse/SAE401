<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catalogue</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="./js/getBooks.js" defer></script>

</head>

<body>
    <div x-data="myApp()" x-init="fetchBooks">
        <h1>Index de polymedia</h1>
        <ul>
            <template x-for="book in books" :key="book . id">
                <li x-text="book.title"></li>
            </template>
        </ul>
    </div>
</body>

</html>