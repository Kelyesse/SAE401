document.addEventListener("alpine:init", () => {
    Alpine.data("userInfos", () => ({
        userInfos: {},
        originalInfos: {},
        isEditing: false,
        async fetchUserInfos() {
            try {
                const response = await fetch("/api/user");
                const data = await response.json();
                this.userInfos = data;
                this.originalInfos = { ...data }; // Sauvegarder l'original pour annuler si nécessaire
            } catch (error) {
                console.error(
                    "Une erreur s'est produite lors de la récupération des informations:",
                    error
                );
            }
        },
        editField(...fields) {
            this.isEditing = true;
        },
        cancelEditing() {
            this.userInfos = { ...this.originalInfos }; // Revenir aux informations originales
            this.isEditing = false;
        },
        async saveChanges() {
            try {
                const response = await fetch(`/api/user/${this.userInfos.id}`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify(this.userInfos),
                });
                if (!response.ok) {
                    throw new Error(
                        "Erreur lors de la sauvegarde des modifications."
                    );
                }
                const data = await response.json();
                this.isEditing = false;
            } catch (error) {
                console.error(
                    "Une erreur s'est produite lors de la sauvegarde des informations:",
                    error
                );
            }
        },
        init() {
            this.fetchUserInfos();
        },
    }));
});
