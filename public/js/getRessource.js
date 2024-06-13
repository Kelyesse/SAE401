document.addEventListener("alpine:init", () => {
    Alpine.data("ressource", () => ({
        ressource: [],
        ratings: [],
        numberOfRatings: 0,
        newReview: { text: "" },
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

        async submitReview() {
            // Logique pour soumettre un avis
            console.log("Submit Review:", this.newReview.text);
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

        submitReview() {
            fetch("/api/add-review", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}", // Utilisez le jeton CSRF pour protéger contre les attaques CSRF
                },
                body: JSON.stringify({
                    commentaire: this.newReview.text,
                }),
            })
                .then((response) => {
                    if (response.ok) {
                        // Réussite, effacez le contenu du champ de texte après l'envoi de l'avis
                        this.newReview.text = "";
                        // Vous pouvez également mettre à jour les avis affichés si nécessaire
                        // Par exemple, en rappelant la méthode fetchRatings() pour obtenir les derniers avis
                    } else {
                        // Gestion des erreurs si nécessaire
                        console.error(
                            "Failed to submit review:",
                            response.statusText
                        );
                    }
                })
                .catch((error) => {
                    console.error("Error submitting review:", error);
                });
        },
    }));
});
