document.addEventListener("alpine:init", () => {
    Alpine.data("bibliothecaire", () => ({
        reservations: [],
        resources: [],
        editeurs: [],
        newResource: {
            type: "livre",
            titre: "",
            isbn: "",
            ian: "",
            genre: "",
            nombre_pages: "",
            duree: "",
            annee: "",
            description: "",
            langue: "",
            auteur: "",
            acteur: "",
            realisateur: "",
            editeur: "",
            nombre_exemplaires: "",
            imgUrl: null,
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
                const response = await fetch("/api/reservations/all");
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
                const response = await fetch("/api/ressources");
                const data = await response.json();
                this.isResponseEmpty = data.length === 0;
                this.filteredResources = data;
                this.isFiltered = false;
                console.log(this.filteredResources);
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
                    `/api/ressources/search?${queryParams.toString()}`
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
                const formData = new FormData(); // Créez un nouvel objet FormData

                // Ajoutez les champs de votre nouvel élément au FormData
                formData.append("type", this.newResource.type);
                formData.append("titre", this.newResource.titre);
                formData.append("isbn", this.newResource.isbn);
                formData.append("ian", this.newResource.ian);
                formData.append("genre", this.newResource.genre);
                formData.append("nombre_pages", this.newResource.nombre_pages);
                formData.append("duree", this.newResource.duree);
                formData.append("annee", this.newResource.annee);
                formData.append("description", this.newResource.description);
                formData.append("langue", this.newResource.langue);
                formData.append("auteur", this.newResource.auteur);
                formData.append("acteur", this.newResource.acteur);
                formData.append("realisateur", this.newResource.realisateur);
                formData.append("editeur", this.newResource.editeur);
                formData.append(
                    "nombre_exemplaires",
                    this.newResource.nombre_exemplaires
                );

                // Ajoutez l'image au FormData
                formData.append("imgUrl", this.newResource.imgUrl);
                formData.append(
                    "_token",
                    document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content")
                );

                // Perform the fetch request with FormData
                const response = await fetch("/api/ressources/add", {
                    method: "POST",
                    body: formData,
                });
                const data = await response.json();
                if (data.success) {
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
        async fetchEditeurs() {
            try {
                const response = await fetch("/api/editeurs");
                const data = await response.json();
                this.editeurs = data;
            } catch (error) {
                console.error(
                    "Erreur lors de la récupération des ressources:",
                    error
                );
            }
        },
        handleFileUpload(event) {
            const file = event.target.files[0];
            console.log(file);
            this.newResource.imgUrl = file;
        },
        init() {
            this.fetchReservations();
            this.fetchAllResources();
            this.fetchEditeurs();
        },
    }));
});
