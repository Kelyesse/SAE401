document.addEventListener("alpine:init", () => {
    Alpine.data("homepageRessources", () => ({
        homepageRessources: {
            new_ressources: [],
            favorite_ressources: [],
            books: [],
            movies: [],
        },
        async fetchHomepageRessources() {
            try {
                const response = await fetch("/api/ressources/homepage");
                const data = await response.json();
                console.log(data);
                this.homepageRessources = data;
            } catch (error) {
                console.error(
                    "Une erreur s'est produite lors de la récupération des ressources:",
                    error
                );
            }
        },
    }));
});
