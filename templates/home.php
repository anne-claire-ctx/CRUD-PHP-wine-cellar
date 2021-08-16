<?php
require "templates/header.php"
?>
<main>
    <header class="header">
        <div class="header-title">
            <img src="assets/img/logo-blanc.png" alt="logo My cave">
            <h2>Vos vins d'exception</h2>
        </div>
        <video id="myvideo" muted autoplay loop width="600" poster="assets/img/poster.jpg">
            <source src="assets/video/wine.mp4" type="video/mp4">
            <source src="assets/video/wine.ogv" type="video/ogv">
            <source src="assets/video/wine.webm" type="video/webm">
            Veuillez mettre à jour votre navigateur.
        </video>
    </header>
    <section class="introduction">
        <div class="introduction-content">
            <p>Depuis 1984, MyCAVE sélectionne les meilleurs vins <br />
                à travers le monde pour vous les faire découvrir.</p>
            <div>
                <p>Consultez et construisez votre cave avec l'aide de nos experts.</p>
                <img src="assets/img/wine-cooler.png" alt="logo cave a vin">
            </div>
        </div>
        <div class="introduction-img">
            <img src="assets/img/vertical-grapes.jpg" alt="Raisin">
        </div>
    </section>
    <section class="swiper">
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="swiper-content">
                        <img src="assets/img/lan-rioja.png" alt="lan-rioja bouteille">
                    </div>
                    <div>
                        <p class="bottle-name">LAN RIOJA CRIANZA</p>
                        <p class="bottle-location">Rioja, Espagne</p>
                        <p class="bottle-year">2006</p>
                        <p class="bottle-grapes">Tempranillo</p>
                        <p class="bottle-description">Léger et rebondissant, avec un soupçon de truffe noire, ce vin ne manquera pas de titiller les papilles.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-content">
                        <img src="assets/img/lurton.png" alt="lurton bouteille">
                    </div>
                    <div>
                        <p class="bottle-name">BODEGA LURTON</p>
                        <p class="bottle-location">Mendoza, Argentina</p>
                        <p class="bottle-year">2011</p>
                        <p class="bottle-grapes">Pinot Gris</p>
                        <p class="bottle-description">De solides notes de cassis mêlées à une légère touche d'agrumes font de ce
                            un vin facile à boire pour des palais variés. Un nez charmeur et typé, digne d'un terroir exceptionnel.
                            terroir exceptionnel. Un vin blanc moderne et très savoureux.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-content">
                        <img src="assets/img/bouscat.png" alt="bouscat bouteille">
                    </div>
                    <div>
                        <p class="bottle-name">DOMAINE DU BOUSCAT</p>
                        <p class="bottle-location">Bordeaux, France</p>
                        <p class="bottle-year">2009</p>
                        <p class="bottle-grapes">Merlot</p>
                        <p class="bottle-description">La légère couleur dorée de ce vin dissimule la saveur vive qu'il renferme. Véritable vin d'été, il ne demande qu'à être dégusté lors d'un pique-nique dans un vignoble baigné de soleil.</p>
                    </div>
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
</main>

<?php require "templates/footer.php" ?>