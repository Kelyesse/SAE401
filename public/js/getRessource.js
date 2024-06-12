document.addEventListener("alpine:init", () => {
    Alpine.data("ressource", () => ({
        ressource: [],
        ratings: [],
        numberOfRatings: 0,
        newReview: {
            text: ''
        },
        async fetchRessource() {
            try {
                const params = new URLSearchParams(window.location.search);
                const isbn = params.get('isbn');
                const ian = params.get('ian');
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
                const response = await fetch(`/ressource/getRatings${queryString}`);
                if (response.ok) {
                    const data = await response.json();
                    if (Array.isArray(data)) {
                        this.ratings = data;
                        this.numberOfRatings = data.length; // Mise à jour du nombre d'avis
                        console.log(this.ratings); // Vérifiez que les avis sont correctement récupérés
                    } else {
                        console.warn('Unexpected data format:', data);
                        this.ratings = [];
                        this.numberOfRatings = 0;
                    }
                } else {
                    console.error('Failed to fetch ratings. Status:', response.status);
                    this.numberOfRatings = 0;
                }
            } catch (error) {
                console.error('Error fetching ratings:', error);
                this.ratings = [];
                this.numberOfRatings = 0;
            }
        },

        async submitReview() {
            // Logique pour soumettre un avis
            console.log('Submit Review:', this.newReview.text);
        }
    }));
});
