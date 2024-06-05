// contact.js

function contactForm() {
    return {
        // Autres propriétés et méthodes...
        submitForm() { // Method to handle form submission
            console.log({
                question: this.question,
                newsletter: this.newsletter
            });
            
            // Vérifie si la case newsletter est cochée
            if (this.newsletter) {
                // Envoie un e-mail
                fetch('send_email.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        question: this.question,
                        newsletter: this.newsletter
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erreur lors de l\'envoi de l\'e-mail');
                    }
                    console.log('E-mail envoyé avec succès !');
                })
                .catch(error => {
                    console.error('Erreur:', error);
                });
            }
            
            // Autres actions de soumission du formulaire, si nécessaire
        }
    };
}