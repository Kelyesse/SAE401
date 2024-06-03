<?php include_once('./navbar.blade.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/contact.css">
    <title>Contact</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="../js/contact.js" defer></script> <!-- Inclure le fichier JS externe -->
</head>
<body x-data="contactForm()">
    <div id="titre">
        <h2 id="titre-texte">Formulaire de contact</h2>
        <div id="ligne-rouge"></div>
    </div>

    <form id="section-formulaire" @submit.prevent="submitForm">
        <p id="description">Polymedia est à votre service ! <br> Contactez nous pour toute demande d'information ou d'aide</p>
        <section id="champs">
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
