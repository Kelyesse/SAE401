

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dune 2 Review</title>
    <link rel="stylesheet" href="./style/ressource.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body>
    <div id="ctn-ressource" class="container" x-data="reviewForm()">
        <div class="movie-info">
            <img id="img-ressource" src="./storage/dune.jpg" alt="Dune 2">
            <div class="details">
                <h1 id="titre-ressource">Dune 2</h1>
                <div id="section-auteur">
                    <img id="icone-auteur" src="./storage/icone-auteur.svg" alt="">
                    <p id="auteur-ressource">Denis Villeneuve</p>
                </div>
                <div style="width:350px; background-color:#010423; height:2px; margin:20px 0;"></div>
                <p id="type-ressource">Film - 2024</p>
                <p id="description-ressource">
                    Paul Atreides va rallier Chani et aux Fremen tout en préparant sa revanche contre ceux qui ont détruit sa famille. 
                    Au vu de la vie de l'amour de sa vie et en choisissant d'embrasser l'amour de sa vie et le destin de l'univers, il devra
                    éviter un terrible futur que lui seul peut prédire.
                </p>
                <div id="disponible">
                    <div id="icone-disponible"></div>
                    <p class="available-text">Cette ressource est disponible</p>
                </div>
                <button class="btn-reserve">Réserver</button>
            </div>
        </div>
    </div>

    <img src="../img/wave.png" alt="" style="width:100%">

    <div id="section-avis">
        <div class="review-form">
                <h2>Donnez votre avis</h2>
                <textarea x-model="newReview.text" placeholder="Écrivez votre avis ici"></textarea>
                <button @click="submitReview()">Envoyer</button>
            </div>

            <div class="reviews" style="background-color:#161b2a">
                <h2>Avis (<span x-text="reviews.length"></span>)</h2>
                <template x-for="review in reviews" :key="review.id">
                    <div class="review">
                        <h3 x-text="review.name"></h3>
                        <div class="stars">
                            <template x-for="star in 5">
                                <span :class="{'filled': star <= review.rating}">&#9733;</span>
                            </template>
                        </div>
                        <p x-text="review.text"></p>
                    </div>
                </template>
            </div>
        <script src="script.js"></script>
    </div>
        
</body>
</html>
