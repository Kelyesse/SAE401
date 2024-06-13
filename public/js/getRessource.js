document.addEventListener("alpine:init", () => {
    Alpine.data("ressource", () => ({
        ressource: [],
        ratings: [],
        numberOfRatings: 0,
        newReview: {
            commentaire: "",
            id_utilisateur: null, // Mettez à jour cela avec l'ID de l'utilisateur connecté
            id_livre: null, // Mettez à jour cela avec l'ID du livre ou DVD
            id_dvd: null, // Mettez à jour cela avec l'ID du livre ou DVD
            type_ressource: "", // Mettez à jour cela avec le type (livre ou dvd)
            note: null,
            date_note: new Date().toISOString().slice(0, 10), // Date du jour
        },
        isUserLoggedIn: false,

        async fetchRessource() {
            try {
                const params = new URLSearchParams(window.location.search);
                const isbn = params.get("isbn");
                const ian = params.get("ian");
                const queryParam = isbn ? `isbn=${isbn}` : `ian=${ian}`;
                const response = await fetch(`/api/ressource?${queryParam}`);
                const data = await response.json();
                console.log(data);
                this.ressource = data;
            } catch (error) {
                console.error(
                    "Une erreur s'est produite lors de la récupération de la ressource",
                    error
                );
            }
        },

        async fetchRatings() {
            try {
                const queryString = window.location.search;
                const response = await fetch(
                    `/ressource/getRatings${queryString}`
                );
                if (response.ok) {
                    const data = await response.json();
                    if (Array.isArray(data)) {
                        this.ratings = data;
                        this.numberOfRatings = data.length; // Mise à jour du nombre d'avis
                        console.log(this.ratings); // Vérifiez que les avis sont correctement récupérés
                    } else {
                        console.warn("Unexpected data format:", data);
                        this.ratings = [];
                        this.numberOfRatings = 0;
                    }
                } else {
                    console.error(
                        "Failed to fetch ratings. Status:",
                        response.status
                    );
                    this.numberOfRatings = 0;
                }
            } catch (error) {
                console.error("Error fetching ratings:", error);
                this.ratings = [];
                this.numberOfRatings = 0;
            }
        },

        async checkUserLoggedIn() {
            try {
                const response = await fetch(`/api/checkSession`);
                const data = await response.json();
                if (data.nom) {
                    this.isUserLoggedIn = true; // Remplacer par votre logique réelle
                }
            } catch (error) {
                console.error(
                    "Une erreur s'est produite lors de la récupération de la ressource",
                    error
                );
            }
        },

        async submitReview() {
            try {
                const params = new URLSearchParams(window.location.search);
                const isbn = params.get("isbn");
                const ian = params.get("ian");
                const id = params.get("id");
                if (ian) {
                    this.newReview.type_ressource = "dvd";
                    this.newReview.id_dvd = id;
                } else if (isbn) {
                    this.newReview.type_ressource = "livre";
                    this.newReview.id_livre = id;
                }
                this.newReview.note = 4.0;

                const response = await fetch("/api/add-review", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify(this.newReview),
                });
                if (response.ok) {
                    // Réinitialiser le formulaire après un envoi réussi
                    this.newReview.commentaire = "";
                    this.newReview.note = null;
                    alert("Avis ajouté avec succès !");
                    // Recharger les avis ou rafraîchir la page si nécessaire
                } else {
                    console.error(
                        "Échec de l'ajout de l'avis:",
                        response.statusText
                    );
                    alert(
                        "Erreur lors de l'ajout de l'avis. Veuillez réessayer."
                    );
                }
            } catch (error) {
                console.error("Erreur lors de la soumission de l'avis:", error);
                alert("Une erreur s'est produite. Veuillez réessayer.");
            }
        },
    }));
});
