<!DOCTYPE html>
<html lang="fr" x-data="{ menuOpen: false, delay: 200 }">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navbar</title>
    <link rel="stylesheet" href="../css/navbar.css"/>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2" defer></script>
  </head>
  <body>
    <header id="barnav">
      <div id="navbar">
        <a href="./index.html" id="logo_desktop">POLYMEDIA</a>
        <div id="rubriques">
          <a href="./catalogue.html" id="rubrique_catalogue">Catalogue</a>
          <a href="./catalogue.html" id="rubrique_catalogue">Contact</a>
          <a href=""
            ><img src="../img/compte.svg" alt="Compte" id="icone_compte"
          /></a>
        </div>
        <img
          src="../img/menu.png"
          alt="Menu"
          id="menu_burger"
          @click="menuOpen = !menuOpen"
        />
      </div>
      <div
        id="rubriques_mobile"
        x-show="menuOpen"
        @click.away="menuOpen = false"
        x-transition
      >
        <a
          href="#"
          class="rubrique_mobile"
          x-show.transition="menuOpen"
          x-transition.delay="200ms"
          >Catalogue</a
        >
        <a
          href="#"
          class="rubrique_mobile"
          x-show.transition="menuOpen"
          x-transition.delay="400ms"
          >Contact</a
        >
        <a
          href="#"
          class="rubrique_mobile"
          x-show.transition="menuOpen"
          x-transition.delay="600ms"
          >Compte</a
        >
      </div>
    </header>
  </body>
</html>
