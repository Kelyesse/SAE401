document.addEventListener("alpine:init", () => {
    Alpine.data("ressources", () => ({
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
        isFiltered: false,
        async fetchAllRessources() {
            try {
                const response = await fetch("/api/ressources");
                const data = await response.json();
                this.isResponseEmpty = data.length === 0;
                this.filteredRessources = data;
                this.isFiltered = false;
            } catch (error) {
                console.error(
                    "Une erreur s'est produite lors de la récupération des ressources:",
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
                this.isFiltered = true;
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
        redirectToCatalog() {
            if (
                window.location.pathname == "/index" ||
                window.location.pathname == "/"
            ) {
                window.location.href =
                    "/catalogue?searchQuery=" + this.filters.searchQuery;
            }
            return;
        },
        init() {
            const urlParams = new URLSearchParams(window.location.search);
            const searchQuery = urlParams.get("searchQuery");
            if (searchQuery) {
                this.filters.searchQuery = searchQuery;
                this.fetchFilteredRessources();
            } else {
                this.fetchAllRessources();
            }
        },
    }));
});
