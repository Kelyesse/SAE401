<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="./style/navbar.css" />
    <link rel="stylesheet" href="./style/footer.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.0/dist/cdn.min.js"></script>
    <script src="./js/checkSession.js"></script>
</head>

<body>

    <header id="barnav" x-data="{ menuOpen: false }">
        <div id="navbar" x-data="session">
            <a href="/" id="logo_desktop">POLYMEDIA</a>
            <div id="rubriques">
                <a href="/catalogue" id="rubrique_web">Catalogue</a>
                <a href="/contact" id="rubrique_web">Contact</a>
                <a href="/compte"><img src="./storage/compte.svg" alt="Compte" id="icone_compte" /></a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" id="logout-button" x-show="isUserLoggedIn" x-init="checkUserLoggedIn"><img src="/storage/deconnexion2.png" alt=""></button>
                </form>
            </div>
            <img src="./storage/menu.png" alt="Menu" id="menu_burger" @click="menuOpen = !menuOpen" />
        </div>
        <div id="rubriques_mobile" x-show="menuOpen" @click.away="menuOpen = false">
            <a href="/catalogue" class="rubrique_mobile">Catalogue</a>
            <a href="/contact" class="rubrique_mobile">Contact</a>
            <a href="/compte" class="rubrique_mobile">Compte</a>

        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer id="footer-desktop">
        <div id="footer-logo-container">
            <a id="footer-logo" href="/">POLYMEDIA</a>
        </div>
        <div class="separation-line" alt=""> </div>
        <div id="anchorList">
            <ul>
                <h2 style="margin-bottom:20px; color:#fff; font-family:'stara-bold'">Navigation</h2>
                <li><a class="rubriques-footer" href="/">Accueil</a></li>
                <li><a class="rubriques-footer" href="/catalogue">Catalogue</a></li>
                <li><a class="rubriques-footer" href="/contact">Contact</a></li>
            </ul>
        </div>
        <div id="footer-contacts">
            <div id="footer-mail" class="footer-contact">
                <img class="footer-icone" src="./storage/icone-mail.svg" alt="">
                <a class="rubriques-footer" href="mailto:contact@polymedia.com">contact@polymedia.com</a>
            </div>
            <div id="footer-telephone" class="footer-contact">
                <img class="footer-icone" src="./storage/icone-telephone.svg" alt="">
                <a class="rubriques-footer" href="tel:0612345678">06.12.34.56.78</a>
            </div>
            <div id="footer-maps" class="footer-contact">
                <img class="footer-icone" src="./storage/icone-lieu-blanc.png" alt="">
                <a class="rubriques-footer" href="https://www.google.fr/maps/place/IUT+MMI/@43.1211982,5.9372669,17z/data=!3m1!4b1!4m6!3m5!1s0x12c91b0a6b2cea6f:0xa865e0843e39d84e!8m2!3d43.1211943!4d5.9398418!16s%2Fg%2F11g9qc1k8f?entry=ttu">70 Avenue Roger Devoucoux</a>
            </div>
        </div>
        <div id="iconeLangueFooter" @click="open = !open" x-data="{ open: false }" x-cloak>
            <img id="icone-langue" class="footer-icone" src="./storage/icone-langues.svg"
                :class="{ 'icon-moved': open }" alt="">
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
                <img class="footer-icone" src="./storage/icone-mail.svg" alt="">
                <a href="mailto:contact@polymedia.com">contact@polymedia.com</a>
            </div>
            <div id="footer-telephone" class="footer-contact">
                <img class="footer-icone" src="./storage/icone-telephone.svg" alt="">
                <a href="tel:0612345678">06.12.34.56.78</a>
            </div>
            <div id="footer-maps" class="footer-contact">
                <img class="footer-icone" src="./storage/icone-lieu-blanc.png" alt="">
                <a href="https://www.google.fr/maps/place/IUT+MMI/@43.1211982,5.9372669,17z/data=!3m1!4b1!4m6!3m5!1s0x12c91b0a6b2cea6f:0xa865e0843e39d84e!8m2!3d43.1211943!4d5.9398418!16s%2Fg%2F11g9qc1k8f?entry=ttu">70 Avenue Roger Devoucoux</a>
            </div>
        </div>
        <div id="anchorList">
            <ul>
                <li><a class="rubriques-footer" href="/">Accueil</a></li>
                <li><a class="rubriques-footer" href="/catalogue">Catalogue</a></li>
                <li><a class="rubriques-footer" href="/contact">Contact</a></li>
            </ul>
        </div>
        <div id="iconeLangueFooter" @click="open = !open" x-data="{ open: false }" x-cloak>
            <img id="icone-langue" class="footer-icone" src="./storage/icone-langues.svg"
                :class="{ 'icon-moved': open }" alt="">
            <div :class="{ 'langue-options': true, 'open': open }">
                <a href="#" class="langue-link">Français</a>
                <a href="#" class="langue-link">English</a>
                <a href="#" class="langue-link">Español</a>
            </div>
        </div>
    </footer>

</body>

</html>
