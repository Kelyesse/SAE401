function reviewForm() {
    return {
        newReview: {
            name: 'Votre nom',
            text: '',
            rating: 5
        },
        reviews: [
            {
                id: 1,
                name: 'A. Martin',
                text: "Dune deuxième partie, réalisée par Denis Villeneuve, est une œuvre cinématographique monumentale qui élève la série de science-fiction à de nouveaux sommets. Le spectateur dans un voyage épique à travers l'univers complexe créé par Frank Herbert.",
                rating: 4
            },
            {
                id: 2,
                name: 'B. Dupuis',
                text: "Je suis déçue de la façon dont ce film reste fidèle aux romans de Frank Herbert. Rien ne pourra être plus juste.",
                rating: 2
            }
        ],
        submitReview() {
            if (this.newReview.text.trim() !== '') {
                this.reviews.push({
                    id: this.reviews.length + 1,
                    name: this.newReview.name,
                    text: this.newReview.text,
                    rating: this.newReview.rating
                });
                this.newReview.text = '';
            }
        }
    }
}
