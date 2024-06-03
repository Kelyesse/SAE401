<?php

include_once('./navbar.blade.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/contact.css">
    <title>Contact</title>
</head>
<body>
    <div id="titre">
        <h2 id="titre-texte">Formulaire de contact</h2>
        <div id="ligne-rouge"></div>
    </div>

    <form id="section-formulaire">
        <p id="description">Polymedia est à votre service ! <br> Contactez nous pour toute demande d'information ou d'aide</p>
        <section id="champs">
            <div id="nom">
                <p id="titre-nom" class="titre">Nom</p>
                <div id="inputs-nom" class="inputs">
                    <input id="input-prenom" class="input-half" type="text" placeholder="Prénom">
                    <input id="input-nom" class="input-half" type="text" placeholder="Nom">
                </div>
            </div>
            <div id="adresse">
                <p id="titre-adresse" class="titre">Adresse</p>
                <div id="inputs-adresse" class="inputs">
                    <input type="text" id="input-adresse" class="input-full" placeholder="Adresse">
                    <div id="sous-adresse">
                        <input type="text" id="input-ville" class="input-tier" placeholder="Ville">
                        <input type="text" id="input-codepostal" class="input-tier" placeholder="Code postal">
                        <input type="text" id="input-complement" class="input-tier" placeholder="Complément">
                    </div>
                </div>
            </div>
            <div id="contact">
                <p id="titre-contact" class="titre">Contact</p>
                <div id="inputs-contact" class="inputs">
                    <input type="email" class="input-half" name="email" id="input-email" placeholder="Email">
                    <input type="number" class="input-half" id="input-telephone" name="telephone" placeholder="Téléphone">
                </div>
            </div>
            <div id="newsletter">
                <input type="checkbox" name="news-letter" id="newsletter">
                <p id="text-newsletter">Me tenir informé des actualités et des nouveautés par email</p>
            </div>
        </section>
        <input type="submit" id="contactform-submit">
    </form>
</body>
</html>

<?php

    include_once('footer.blade.php');

?>