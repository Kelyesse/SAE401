document.addEventListener("alpine:init", () => {
    Alpine.data("session", () => ({
        isUserLoggedIn: false, 

        async checkUserLoggedIn() {

            
            try {
                const response = await fetch(`/api/checkSession`);
                const data = await response.json();
                console.log(data);
                if(data.nom)
                {   
                    this.isUserLoggedIn = true; // Remplacer par votre logique réelle
                    console.log('badojazo');
                }
            } catch (error) {
                console.error(
                    "Une erreur s'est produite lors de la récupération de la ressource",
                    error
                );
            }
        },

        
    }));

});
