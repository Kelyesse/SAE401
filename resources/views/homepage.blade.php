<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/homepage.css"> <!-- Adjust path to css -->
    <title>Homepage</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="./../../public/js/faq.js" defer></script>
    <script src="./../../public/js/getAllBooks.js" defer></script> <!-- Inclure le fichier JS externe -->
</head>
<body>
    <?php include_once('./navbar.blade.php'); ?>

    <main>
        <section class="hero">
            <img src="../img/img_background.webp" alt="Background Image" class="hero__background-image">
            <div class="hero__content">
                <h1 class="hero__title">Livres et DVDs accessibles pour tous.</h1>
                <h2 class="hero__description">Accédez à notre catalogue complet</h2>
                <input type="text" class="hero__search-input" placeholder="Rechercher">
                <button class="hero__search-button">🔍</button>
            </div>
        </section>

        <section class="favorites" x-data="carousel">
            <h2>Nos coups de coeur</h2>
            <p>Découvrez notre sélection de livres et de DVDs préférés, soigneusement choisis par notre équipe pour vous offrir le meilleur divertissement.</p>
            <div class="carousel">
                <button class="carousel__button carousel__button--prev" @click="prev">⬅️</button>
                <div class="carousel__track">
                    <template x-for="film in films" :key="film.id">
                        <div class="carousel__item">
                            <img :src="film.image" alt="Titre du film">
                            <p x-text="film.title"></p>
                        </div>
                    </template>
                </div>
                <button class="carousel__button carousel__button--next" @click="next">➡️</button>
            </div>
        </section>

        <section class="features">
            <div class="feature">
                <img src="../img/bobine-de-film.png" alt="Icon 1" class="feature__image">
                <h3>Un divertissement sans fin</h3>
                <p>Découvrez des milliers d'heures de séries, films et productions originales.</p>
            </div>
            <div class="feature">
                <img src="../img/multiplateforme.png" alt="Icon 2" class="feature__image">
                <h3>Multiplateforme</h3>
                <p>Retrouvez-nous également sur mobile, via notre application !</p>
            </div>
            <div class="feature">
                <img src="../img/controle-parental.png" alt="Icon 3" class="feature__image">
                <h3>Communauté</h3>
                <p>Rejoignez notre communauté de passionnés. Ensemble, explorons le monde fascinant de la littérature et du cinéma.</p>
            </div>
        </section>

        <section class="faq" x-data="faq">
            <h2 class="faq__title">Les questions fréquentes</h2>
            <div class="faq__item" :class="{ 'faq__item--active': activeItem === 1 }">
                <button class="faq__question-button" @click="toggle(1)">
                    <span>Qu'est-ce que Polymedia ?</span>
                    <span class="faq__question-icon">+</span>
                </button>
                <div class="faq__answer" x-show="activeItem === 1" x-transition>
                    <p>PolyMedia est une plateforme pour accéder aux livres et DVDs.</p>
                </div>
            </div>
            <div class="faq__item" :class="{ 'faq__item--active': activeItem === 2 }">
                <button class="faq__question-button" @click="toggle(2)">
                    <span>Comment puis-je m'inscrire ?</span>
                    <span class="faq__question-icon">+</span>
                </button>
                <div class="faq__answer" x-show="activeItem === 2" x-transition>
                    <p>Vous pouvez vous inscrire en cliquant sur le bouton "S'inscrire" en haut de la page.</p>
                </div>
            </div>
            <div class="faq__item" :class="{ 'faq__item--active': activeItem === 3 }">
                <button class="faq__question-button" @click="toggle(3)">
                    <span>Quels sont les moyens de paiement acceptés ?</span>
                    <span class="faq__question-icon">+</span>
                </button>
                <div class="faq__answer" x-show="activeItem === 3" x-transition>
                    <p>Nous acceptons les cartes de crédit, PayPal et d'autres méthodes de paiement en ligne.</p>
                </div>
            </div>
        </section>
    </main>

    <script>
        function carousel() {
            return {
                currentIndex: 0,
                films: [],
                async fetchBooks() {
                    try {
                        const response = await fetch('../../path/to/fetchFilms.php');
                        const data = await response.json();
                        this.films = data;
                    } catch (error) {
                        console.error("Une erreur s'est produite lors de la récupération des films:", error);
                    }
                },
                prev() {
                    this.currentIndex = (this.currentIndex > 0) ? this.currentIndex - 1 : this.films.length - 1;
                },
                next() {
                    this.currentIndex = (this.currentIndex < this.films.length - 1) ? this.currentIndex + 1 : 0;
                }
            }
        }
    </script>

</body>
</html>
<?php include_once('footer.blade.php'); ?>