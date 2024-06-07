document.addEventListener("alpine:init", () => {
    Alpine.data("ressource", () => ({
        ressource: [],
        async fetchRessource() {
            try {
                const response = await fetch("/api/books");
                const data = await response.json();
                console.log(data);
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