const BOOK_CONTROLLER_URL = "/api/books";

function myApp() {
    return {
        books: [],
        fetchBooks() {
            fetch(BOOK_CONTROLLER_URL)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(
                            `Erreur HTTP! Statut: ${response.status}`
                        );
                    }
                    return response.json();
                })
                .then((data) => {
                    console.log("Livres récupérés avec succès :", data);
                    this.books = data; // Mettre à jour les livres dans Alpine.js
                })
                .catch((error) => {
                    console.error(
                        "Erreur lors de la récupération des livres :",
                        error
                    );
                });
        },
    };
}

document.addEventListener("alpine:init", () => {
    Alpine.data("myApp", myApp);
});
