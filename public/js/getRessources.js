document.addEventListener("alpine:init", () => {
    Alpine.data("ressources", () => ({
        ressources: [],
        showFilters: false,
        searchQuery: "",
        filteredRessources: [],
        async fetchAllRessources() {
            try {
                const response = await fetch("/api/ressources");
                const data = await response.json();
                console.log(data);
                this.ressources = data;
                this.filteredRessources = data;
            } catch (error) {
                console.error(
                    "Une erreur s'est produite lors de la récupération des livres:",
                    error
                );
            }
        },
        async fetchFilteredRessources() {
            try {
                console.log(this.searchQuery);
                const response = await fetch(
                    "/api/ressources/search?searchQuery=" + this.searchQuery
                );
                const data = await response.json();
                this.filteredRessources = data;
            } catch (error) {
                console.error(
                    "Une erreur s'est produite lors de la récupération des ressources filtrées:",
                    error
                );
            }
        },
        clearSearch() {
            this.searchQuery = "";
            this.fetchAllRessources();
        },
    }));
});
