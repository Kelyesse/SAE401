// contact.js

function contactForm() {
    return {
        prenom: '', // Initial state for 'prenom' input
        nom: '', // Initial state for 'nom' input
        adresse: '', // Initial state for 'adresse' input
        ville: '', // Initial state for 'ville' input
        codepostal: '', // Initial state for 'codepostal' input
        complement: '', // Initial state for 'complement' input
        email: '', // Initial state for 'email' input
        telephone: '', // Initial state for 'telephone' input
        question: '', // Initial state for 'question' input
        newsletter: false, // Initial state for 'newsletter' checkbox
        submitForm() { // Method to handle form submission
            console.log({
                prenom: this.prenom,
                nom: this.nom,
                adresse: this.adresse,
                ville: this.ville,
                codepostal: this.codepostal,
                complement: this.complement,
                email: this.email,
                telephone: this.telephone,
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
                        prenom: this.prenom,
                        nom: this.nom,
                        adresse: this.adresse,
                        ville: this.ville,
                        codepostal: this.codepostal,
                        complement: this.complement,
                        email: this.email,
                        telephone: this.telephone,
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
