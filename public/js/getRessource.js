document.addEventListener("alpine:init", () => {
    Alpine.data("ressource", () => ({
        ressource: [],
        ratings: [],
        numberOfRatings: 0,
        isReservationPossible: true,
        newReservation: {
            id_utilisateur: null, // Assuming user with ID 2 exists
            id_livre: null,
            id_dvd: null, // Assuming DVD with ID 1 exists
            type_ressource: "",
            date_debut: new Date().toISOString().split("T")[0],
            date_retour_prevue: new Date(
                new Date().setDate(new Date().getDate() + 14)
            )
                .toISOString()
                .split("T")[0],
        },
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
                this.ressource = data;
                this.isReservationPossible = data.statut === "disponible";
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

                // Définir le type de ressource et l'ID associé
                if (ian) {
                    this.newReview.type_ressource = "dvd";
                    this.newReview.id_dvd = id;
                } else if (isbn) {
                    this.newReview.type_ressource = "livre";
                    this.newReview.id_livre = id;
                }

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
                    this.newReservation.commentaire = "";
                    this.newReservation.note = null;
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
        async makeReservation() {
            try {
                const params = new URLSearchParams(window.location.search);
                const isbn = params.get("isbn");
                const ian = params.get("ian");
                const id = params.get("id");

                if (ian) {
                    this.newReservation.type_ressource = "dvd";
                    this.newReservation.id_dvd = id;
                } else if (isbn) {
                    this.newReservation.type_ressource = "livre";
                    this.newReservation.id_livre = id;
                }

                const response = await fetch("/api/reservations/make", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify(this.newReservation),
                });
            } catch (error) {
                console.error("Erreur lors de la soumission de l'avis:", error);
                alert("Une erreur s'est produite. Veuillez réessayer.");
            }
        },
    }));
});
