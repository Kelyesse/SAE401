document.addEventListener("alpine:init", () => {
    Alpine.data("reservations", () => ({
        reservations: [],
        async fetchReservations() {
            try {
                const response = await fetch("/api/reservations");
                const data = await response.json();
                this.reservations = data;
            } catch (error) {
                console.error(
                    "Une erreur s'est produite lors de la récupération des réservations:",
                    error
                );
            }
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
        init() {
            this.fetchReservations();
        },
    }));
});
