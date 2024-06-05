<?php include_once('./navbar.blade.php');

require '../../../vendor/autoload.php';


if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('resources/libs/PHPMailer-master/src/PHPMailer.php');
require('resources/libs/PHPMailer-master/src/SMTP.php');
require('resources/libs/PHPMailer-master/src/Exception.php');

$errorMessage = '';
$messageSent = false;

if (isset($_POST["email"]) && isset($_POST["mess"])) {
    $email = $_POST["email"];
    $mess = $_POST["mess"];
    $nom = $_POST["nom"] ?? '';
    $prenom = $_POST["prenom"] ?? '';
    $obj = $_POST["obj"] ?? '';

    if (empty($nom) || !preg_match("/^[\p{L} \-'’]+$/u", $nom)) {
        $errorMessage .= 'Nom invalide.<br>';
    }
    if (empty($prenom) || !preg_match("/^[\p{L} \-'’]+$/u", $prenom)) {
        $errorMessage .= 'Prénom invalide.<br>';
    }
    if (empty($obj) || !preg_match("/^[\p{L} \-'’0-9]+$/u", $obj)) {
        $errorMessage .= 'Objet invalide.<br>';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage .= 'Adresse e-mail invalide.<br>';
    }
    if (empty($mess)) {
        $errorMessage .= 'Message vide.<br>';
    }


    if (empty($errorMessage)) {
        $mail = new PHPMailer(true);
        try {
            // Paramètres de PHPMailer
            $mail->isSMTP();
            $mail->Host = 'mail.kourdourli.pro'; // notre adresse de serveur smtp à mettre ici
            $mail->SMTPAuth = true;
            $mail->Username = 'polymedia@kourdourli.pro'; // notre adresse e-mail smtp
            $mail->Password = 'jX4!V8W_vPhXAW7'; // notre mdp smtp
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('noreply@polymedia.fr', 'polymedia');
            $mail->addAddress('polymedia@kourdourli.pro'); // adresse de réception des messages peut être à changer
            $mail->addReplyTo($email, $nom);

            $mail->isHTML(true);
            $mail->Subject = 'Nouveau message de contact depuis votre site';
            $mail->Body = "Nom: $nom<br/>Prénom: $prenom<br/>Email: $email<br/>Objet: $obj<br/>Message:<br/>$mess";
            $mail->AltBody = strip_tags("Nom: $nom\nPrénom: $prenom\nEmail: $email\nObjet: $obj\nMessage:\n$mess");

            $mail->send();
            $messageSent = true;
        } catch (Exception $e) {
            $errorMessage = "Message non envoyé. Erreur : {$mail->ErrorInfo}";
        }
    }
}
?>


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

    <form id="section-formulaire" @submit.prevent="submitForm" method="post">
        <p id="description">Polymedia est à votre service ! <br> Contactez nous pour toute demande d'information ou
            d'aide</p>
        <section id="champs">
            <div id="nom">
                <p id="titre-nom" class="titre">Nom</p>
                <div id="inputs-nom" class="inputs">
                    <input id="input-prenom" class="input-half" type="text" placeholder="Prénom" x-model="prenom"
                        name="prenom">
                    <input id="input-nom" class="input-half" type="text" placeholder="Nom" x-model="nom" name="nom">
                </div>
            </div>
            <div id="adresse">
                <p id="titre-adresse" class="titre">Adresse</p>
                <div id="inputs-adresse" class="inputs">
                    <input type="text" id="input-adresse" class="input-full" placeholder="Adresse" x-model="adresse"
                        name="adresse">
                    <div id="sous-adresse">
                        <input type="text" id="input-ville" class="input-tier" placeholder="Ville" x-model="ville"
                            name="ville">
                        <input type="text" id="input-codepostal" class="input-tier" placeholder="Code postal"
                            x-model="codepostal" name="codepostal">
                        <input type="text" id="input-complement" class="input-tier" placeholder="Complément"
                            x-model="complement" name="complement">
                    </div>
                </div>
            </div>
            <div id="contact">
                <p id="titre-contact" class="titre">Contact</p>
                <div id="inputs-contact" class="inputs">
                    <input type="email" class="input-half" name="email" id="input-email" placeholder="Email"
                        x-model="email">
                    <input type="number" class="input-half" id="input-telephone" name="telephone"
                        placeholder="Téléphone" x-model="telephone">
                </div>
            </div>
            <div id="textbox">
                <p id="titre-contact" class="titre">Question</p>
                <div id="inputs-question" class="inputs">
                    <textarea class="input-full" name="question" id="input-question"
                        placeholder="Ecrivez votre question ici" x-model="question" name="mess"></textarea>
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
