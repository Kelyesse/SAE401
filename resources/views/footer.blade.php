<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="../css/footer.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>
<body>

<footer id="footer-desktop">
    <div id="footer-logo-container">
        <a id="footer-logo" href="index.php">POLYMEDIA</a>
    </div>
    <img id="separation-line" src="../img/line.svg" alt="">
    <div id="anchorList">
        <ul>
            <h2 style="margin-bottom:20px; color:#fff; font-family:'stara-bold'">Navigation</h2>
            <li><a class="rubriques-footer" href="">Accueil</a></li>
            <li><a class="rubriques-footer" href="">Catalogue</a></li>
            <li><a class="rubriques-footer" href="">Contact</a></li>
        </ul>
    </div>
    <div id="footer-contacts">
        <div id="footer-mail" class="footer-contact">
            <img class="footer-icone" src="../img/icone-mail.svg" alt="">
            <a class="rubriques-footer" href="mailto:contact@polymedia.com">contact@polymedia.com</a>
        </div>
        <div id="footer-telephone" class="footer-contact">
            <img class="footer-icone" src="../img/icone-telephone.svg" alt="">
            <a class="rubriques-footer" href="tel:0612345678">06.12.34.56.78</a>
        </div>
    </div>
    <div id="iconeLangueFooter" @click="open = !open" x-data="{ open: false }" x-cloak>
        <img id="icone-langue" class="footer-icone" src="../img/icone-langues.svg" :class="{ 'icon-moved': open }" alt="">
        <div :class="{ 'langue-options': true, 'open': open }">
            <a href="#" class="langue-link">Français</a>
            <a href="#" class="langue-link">English</a>
            <a href="#" class="langue-link">Español</a>
        </div>
    </div>
</footer>

<footer id="footer-mobile">
    <div id="footer-contacts">
        <div id="footer-mail" class="footer-contact">
            <img class="footer-icone" src="../img/icone-mail.svg" alt="">
            <a href="mailto:contact@polymedia.com">contact@polymedia.com</a>
        </div>
        <div id="footer-telephone" class="footer-contact">
            <img class="footer-icone" src="../img/icone-telephone.svg" alt="">
            <a href="tel:0612345678">06.12.34.56.78</a>
        </div>
    </div>
    <div id="anchorList">
        <ul style="display:flex;justify-content:space-between;width:250px;">
            <li>Accueil</li>
            <li>Catalogue</li>
            <li>Contact</li>
        </ul>
    </div>
    <div id="iconeLangueFooter" @click="open = !open" x-data="{ open: false }" x-cloak>
        <img id="icone-langue" class="footer-icone" src="../img/icone-langues.svg" :class="{ 'icon-moved': open }" alt="">
        <div :class="{ 'langue-options': true, 'open': open }">
            <a href="#" class="langue-link">Français</a>
            <a href="#" class="langue-link">English</a>
            <a href="#" class="langue-link">Español</a>
        </div>
    </div>
</footer>

</body>
</html>
