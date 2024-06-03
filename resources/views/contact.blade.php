<?php include_once('./navbar.blade.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/contact.css">
    <title>Contact</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="./js/contact.js" defer></script> <!-- Inclure le fichier JS externe -->
</head>
<body x-data="contactForm()">
    <div id="titre">
        <h2 id="titre-texte">Formulaire de contact</h2>
        <div id="ligne-rouge"></div>
    </div>

    <form id="section-formulaire" @submit.prevent="submitForm">
        <p id="description">Polymedia est à votre service ! <br> Contactez nous pour toute demande d'information ou d'aide</p>
        <section id="champs">
            <div id="nom">
                <p id="titre-nom" class="titre">Nom</p>
                <div id="inputs-nom" class="inputs">
                    <input id="input-prenom" class="input-half" type="text" placeholder="Prénom" x-model="prenom">
                    <input id="input-nom" class="input-half" type="text" placeholder="Nom" x-model="nom">
                </div>
            </div>
            <div id="adresse">
                <p id="titre-adresse" class="titre">Adresse</p>
                <div id="inputs-adresse" class="inputs">
                    <input type="text" id="input-adresse" class="input-full" placeholder="Adresse" x-model="adresse">
                    <div id="sous-adresse">
                        <input type="text" id="input-ville" class="input-tier" placeholder="Ville" x-model="ville">
                        <input type="text" id="input-codepostal" class="input-tier" placeholder="Code postal" x-model="codepostal">
                        <input type="text" id="input-complement" class="input-tier" placeholder="Complément" x-model="complement">
                    </div>
                </div>
            </div>
            <div id="contact">
                <p id="titre-contact" class="titre">Contact</p>
                <div id="inputs-contact" class="inputs">
                    <input type="email" class="input-half" name="email" id="input-email" placeholder="Email" x-model="email">
                    <input type="number" class="input-half" id="input-telephone" name="telephone" placeholder="Téléphone" x-model="telephone">
                </div>
            </div>
            <div id="textbox">
                <p id="titre-contact" class="titre">Question</p>
                <div id="inputs-question" class="inputs">
                    <textarea class="input-full" name="question" id="input-question" placeholder="Ecrivez votre question ici" x-model="question"></textarea>
                </div>
            </div>
            <div id="newsletter">
                <input type="checkbox" name="news-letter" id="newsletter" x-model="newsletter">
                <p id="text-newsletter">Me tenir informé des actualités et des nouveautés par email</p>
            </div>
        </section>
        <input type="submit" id="contactform-submit">
    </form>
</body>
</html>

<?php include_once('footer.blade.php'); ?>
