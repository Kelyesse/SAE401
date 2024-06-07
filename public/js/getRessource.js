document.addEventListener("alpine:init", () => {
    Alpine.data("ressource", () => ({
        ressource: [],
        async fetchRessource() {
            try {
                const params = new URLSearchParams(window.location.search);
                const isbn = params.get('isbn');
                const ian = params.get('ian');
                const queryParam = isbn ? `isbn=${isbn}` : `ian=${ian}`
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
    }));
});