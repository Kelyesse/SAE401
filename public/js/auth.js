document.addEventListener("alpine:init", () => {
    Alpine.data("auth", () => ({
        showRegister: false,
        init() {
            const signUpButton = document.getElementById("signUp");
            const signInButton = document.getElementById("signIn");
            const container = document.getElementById("container");

            if (signUpButton) {
                signUpButton.addEventListener("click", () => {
                    container.classList.add("right-panel-active");
                });
            }

            if (signInButton) {
                signInButton.addEventListener("click", () => {
                    container.classList.remove("right-panel-active");
                });
            }
        },
    }));
});

document.addEventListener("DOMContentLoaded", function () {
    const togglePassword = (toggleId, inputId) => {
        const togglePassword = document.getElementById(toggleId);
        const passwordInput = document.getElementById(inputId);

        if (togglePassword && passwordInput) {
            togglePassword.addEventListener("click", function () {
                const type =
                    passwordInput.getAttribute("type") === "password"
                        ? "text"
                        : "password";
                passwordInput.setAttribute("type", type);
                this.classList.toggle("fa-eye-slash");
            });
        }
    };

    togglePassword("toggle-password-login", "password-login");
    togglePassword("toggle-password-register", "password-register");
    togglePassword("toggle-password-confirm", "password-confirm");
});
