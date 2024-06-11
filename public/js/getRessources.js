document.addEventListener("alpine:init", () => {
    Alpine.data("ressources", () => ({
        ressources: [],
        showFilters: false,
        filteredRessources: [],
        filters: {
            searchQuery: "",
            genre: "",
            isAvailable: false,
            annee: "",
            auteur: "",
            editeur: "",
            acteur: "",
            realisateur: "",
        },
        filterOptions: {},
        isResponseEmpty: false,
        async fetchAllRessources() {
            try {
                const response = await fetch("/api/ressources");
                const data = await response.json();
                this.isResponseEmpty = data.length === 0;
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
            this.showFilters = false;
            try {
                const queryParams = new URLSearchParams(
                    Object.entries(this.filters).filter(([key, value]) => value)
                );
                const response = await fetch(
                    `/api/ressources/search?${queryParams.toString()}`
                );
                const data = await response.json();
                this.isResponseEmpty = data.length === 0;
                this.filteredRessources = data;
            } catch (error) {
                console.error(
                    "Une erreur s'est produite lors de la récupération des ressources filtrées:",
                    error
                );
            }
        },
        async fetchFilterOptions() {
            this.showFilters = true;
            if (Object.keys(this.filterOptions).length > 0) {
                return;
            }
            try {
                const response = await fetch("/api/ressources/filterOptions");
                const data = await response.json();
                this.filterOptions = data;
            } catch (error) {
                console.error(
                    "Une erreur s'est produite lors de la récupération des options de filtre:",
                    error
                );
            }
        },
        clearSearch() {
            (this.filters = {
                searchQuery: "",
                genre: "",
                isAvailable: false,
                annee: "",
                auteur: "",
                editeur: "",
                acteur: "",
                realisateur: "",
            }),
                this.fetchAllRessources();
        },
    }));
});
