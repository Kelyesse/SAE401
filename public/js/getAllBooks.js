// getAllBooks.js

document.addEventListener("alpine:init", () => {
    Alpine.data("books", () => ({
        books: [],
        async fetchBooks() {
            try {
                const response = await fetch("/api/books");
                const data = await response.json();
                console.log(data); // Vérifiez que les données sont correctement récupérées
                this.books = data;
            } catch (error) {
                console.error(
                    "Une erreur s'est produite lors de la récupération des livres:",
                    error
                );
            }
        },
    }));
});
