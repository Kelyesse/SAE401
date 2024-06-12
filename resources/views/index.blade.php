@extends('layouts.layout')

@section('content')


<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="./style/homepage.css"> <!-- Adjust path to css -->
    <script src="./js/faq.js"></script>
    <script src="./js/getRessources.js"></script>
    <script src="./js/carousel.js"></script>
</head>

<main x-data="homepageRessources" x-init="fetchHomepageRessources">
    <section class="hero">
        <img src="./storage/background_homepage.jpg" alt="Background Image" class="hero__background-image">
        <div class="content">
            <h1 class="hero__title">Livres et DVDs accessibles pour tous.</h1>
            <h2 class="hero__description">Accédez à notre catalogue complet</h2>
            <div class="search-bar">
                <div class="input-search-bar" x-data="ressources">
                    <input type="text" placeholder="Rechercher..." x-model="searchQuery"
                        @keydown.enter="fetchFilteredRessources">
                    <template x-if="searchQuery">
                        <img class="clear-icon" src="./storage/clear-icon.png" alt="Clear" @click="clearSearch">
                    </template>
                </div>

                <div class="search-button" @click="fetchFilteredRessources">
                    <img src="./storage/search-icon.svg" alt="Search">
                </div>
            </div>
        </div>
    </section>

    <section class="favorites">
        <h2>Nos coups de coeur</h2>
        <p>Découvrez notre sélection de livres et de DVDs préférés, soigneusement choisis par notre équipe pour vous
            offrir le meilleur divertissement.</p>
        <div class="carousel">
            <img class="carousel-arrow previous-arrow" src="./storage/next-icon.png" alt="" @click="prev">
            <div class="ressource-container">
                <template x-for="ressource in homepageRessources.favorite_ressources">
                    <template x-if="ressource.imgUrl">
                        <a :href="'./ressource?' + (ressource . isbn ? 'isbn=' + ressource . isbn : 'ian=' + ressource . ian) + '&id=' + ressource . id" class="ressource-item">
                            <img class="ressource-img" :src="'./storage/' + ressource . imgUrl" alt="Image du livre">
                            <div class="ressource-title" x-text="ressource.titre"></div>
                            <div class="ressource-year" x-text="ressource.annee"></div>
                        </a>
                    </template>
                </template>
            </div>
            <img class="carousel-arrow" src="./storage/next-icon.png" alt="" @click="next">
        </div>
    </section>

    <section class="news">
        <h2>Les nouveautés</h2>
        <p>Les nouveaux livres et films qui viennent d'arriver chez votre médiathèque préférée.</p>
        <div class="carousel">
            <img class="carousel-arrow previous-arrow" src="./storage/next-icon.png" alt="" @click="prev">
            <div class="ressource-container">
                <template x-for="ressource in homepageRessources.new_ressources">
                    <template x-if="ressource.imgUrl">
                        <a :href="'./ressource?' + (ressource . isbn ? 'isbn=' + ressource . isbn : 'ian=' + ressource . ian) + '&id=' + ressource . id" class="ressource-item">
                            <img class="ressource-img" :src="'./storage/' + ressource . imgUrl" alt="Image du livre">
                            <div class="ressource-title" x-text="ressource.titre"></div>
                            <div class="ressource-year" x-text="ressource.annee"></div>
                        </a>
                    </template>
                </template>
            </div>
            <img class="carousel-arrow" src="./storage/next-icon.png" alt="" @click="next">
        </div>
    </section>

    <section class="features">
        <div class="feature">
            <img src="./storage/bobine-de-film.png" alt="Icon 1" class="feature__image">
            <h3>Un divertissement sans fin</h3>
            <p>Découvrez des milliers d'heures de séries, films et productions originales.</p>
        </div>
        <div class="feature">
            <img src="./storage/multiplateforme.png" alt="Icon 2" class="feature__image">
            <h3>Multiplateforme</h3>
            <p>Retrouvez-nous également sur mobile, via notre application !</p>
        </div>
        <div class="feature">
            <img src="./storage/controle-parental.png" alt="Icon 3" class="feature__image">
            <h3>Communauté</h3>
            <p>Rejoignez notre communauté de passionnés. Ensemble, explorons le monde fascinant de la littérature et du
                cinéma.</p>
        </div>
    </section>

    <section class="faq" x-data="faq">
        <h2 class="faq__title">Les questions fréquentes</h2>
        <div class="faq__item">
            <button class="faq__question-button" @click="toggle(1)">
                <span>Qu'est-ce que Polymedia ?</span>
                <span class="faq__question-icon">+</span>
            </button>
            <div class="faq__answer">
                <p>PolyMedia est une plateforme pour accéder aux livres et DVDs.</p>
            </div>
        </div>
        <div class="faq__item">
            <button class="faq__question-button" @click="toggle(2)">
                <span>Comment puis-je m'inscrire ?</span>
                <span class="faq__question-icon">+</span>
            </button>
            <div class="faq__answer">
                <p>Vous pouvez vous inscrire en cliquant sur le bouton "S'inscrire" en haut de la page.</p>
            </div>
        </div>
        <div class="faq__item">
            <button class="faq__question-button" @click="toggle(3)">
                <span>Quels sont les moyens de paiement acceptés ?</span>
                <span class="faq__question-icon">+</span>
            </button>
            <div class="faq__answer">
                <p>Nous acceptons les cartes de crédit, PayPal et d'autres méthodes de paiement en ligne.</p>
            </div>
        </div>
    </section>
</main>


@endsection