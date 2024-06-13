document.addEventListener("alpine:init", () => {
    Alpine.store("bibliothecaireStore", {
        reservations: [],
        resources: [],
        newResource: {
            type: "livre",
            titre: "",
            auteur: "",
            editeur: "",
            annee: "",
            stock: "",
        },
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
        filteredResources: [],
        filterOptions: {},
        showFilters: false,
        isResponseEmpty: false,
        isFiltered: false,
        async fetchReservations() {
            try {
                const response = await fetch("/api/reservations");
                const data = await response.json();
                this.reservations = data;
            } catch (error) {
                console.error(
                    "Erreur lors de la récupération des réservations:",
                    error
                );
            }
        },
        async fetchAllResources() {
            try {
                const response = await fetch("/api/resources");
                const data = await response.json();
                this.isResponseEmpty = data.length === 0;
                this.filteredResources = data;
                this.isFiltered = false;
            } catch (error) {
                console.error(
                    "Erreur lors de la récupération des ressources:",
                    error
                );
            }
        },
        async fetchFilteredResources() {
            this.showFilters = false;
            try {
                const queryParams = new URLSearchParams(
                    Object.entries(this.filters).filter(([key, value]) => value)
                );
                const response = await fetch(
                    `/api/resources?${queryParams.toString()}`
                );
                const data = await response.json();
                this.isResponseEmpty = data.length === 0;
                this.filteredResources = data;
                this.isFiltered = true;
            } catch (error) {
                console.error(
                    "Erreur lors de la récupération des ressources filtrées:",
                    error
                );
            }
        },
        async addResource() {
            try {
                const response = await fetch("/api/resources", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify(this.newResource),
                });
                const data = await response.json();
                if (data.success) {
                    this.newResource = {
                        type: "livre",
                        titre: "",
                        auteur: "",
                        editeur: "",
                        annee: "",
                        stock: "",
                    };
                    alert("Ressource ajoutée avec succès");
                    this.fetchAllResources();
                } else {
                    throw new Error("Erreur lors de l'ajout de la ressource");
                }
            } catch (error) {
                console.error("Erreur lors de l'ajout de la ressource:", error);
            }
        },
        clearSearch() {
            this.filters = {
                searchQuery: "",
                genre: "",
                isAvailable: false,
                annee: "",
                auteur: "",
                editeur: "",
                acteur: "",
                realisateur: "",
            };
            this.fetchAllResources();
        },
        getRemainingTime(dateRetourPrevue) {
            const dateRetour = new Date(dateRetourPrevue);
            const maintenant = new Date();
            const difference = dateRetour.getTime() - maintenant.getTime();
            const joursRestants = Math.ceil(difference / (1000 * 60 * 60 * 24));
            if (joursRestants > 0) {
                return `Jours restants : ${joursRestants}`;
            } else if (joursRestants === 0) {
                return `A rendre aujourd'hui`;
            } else {
                return `En retard de ${-joursRestants} jours`;
            }
        },
    });

    Alpine.data("bibliothecaire", () => ({
        init() {
            this.$store.bibliothecaireStore.fetchReservations();
            this.$store.bibliothecaireStore.fetchAllResources();
        },
    }));
});
