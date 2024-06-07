document.addEventListener("alpine:init", () => {
    Alpine.data("ressources", () => ({
        ressources: [],
        async fetchAllRessources() {
            try {
                const response = await fetch("/api/ressources");
                const data = await response.json();
                console.log(data);
                this.ressources = data;
            } catch (error) {
                console.error(
                    "Une erreur s'est produite lors de la récupération des livres:",
                    error
                );
            }
        },
    }));
});
