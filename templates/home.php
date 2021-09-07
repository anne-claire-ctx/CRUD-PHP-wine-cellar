<?php
$nav= "home";
require_once __DIR__ . '/header.php';
?>
<main>
    <header class="header">
        <div class="header-title">
            <a href="home"><img src="assets/img/logo-blanc.png" alt="logo My cave"></a>
        </div>
        <div id="mysmallvideo">
            <video muted autoplay=true loop width="100%" poster="assets/img/red.png">
                <source src="assets/video/wine-small.mp4">
            </video>
            <h2>“Si le vin manque,<br/>il manque tout ”</h2>
        </div>
        
        <video id="myvideo" muted autoplay=true loop width="90%" poster="assets/img/poster.jpg">
            <source src="assets/video/wine.mp4" type="video/mp4">
            <source src="assets/video/wine.ogv" type="video/ogv">
            <source src="assets/video/wine.webm" type="video/webm">
            Veuillez mettre à jour votre navigateur.
        </video>
    </header>
    <section class="introduction">
        <div class="introduction-content">
            <div class="introduction-left">
                <img src="assets/img/worldwide.png" alt="logo planete">
                <p>Depuis 1970, MyCAVE sélectionne les <span>meilleurs vins</span> à travers le monde pour vous les faire découvrir.<br/>
            Suivant leur devise avec conviction, nos deux fondateurs, <span>oenologues par passion</span>, vous présentent leurs pépites.  </p>
            </div>
            <div class="introduction-right">
                <p>Comment faire les bons choix ? Consultez et construisez votre cave avec l'aide de nos experts et laissez votre goût s'exprimer pour le <span>plaisir simple</span> d'un bon verre de vin !</p>
                <img src="assets/img/wine-barrel.png" alt="logo cave a vin">
            </div>
        </div>
        <div class="introduction-img">
            <img src="assets/img/vertical-grapes.jpg" alt="Raisin">
        </div>
    </section>
    <section class="swiper">
        <div class="swiper-img-left"><img src="assets/img/weeds.png" alt="Feuilles de vigne"></div>
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="swiper-content">
                        <div class="bottle">
                            <img src="assets/img/lan-rioja.png" alt="lan-rioja bouteille">
                        </div>
                        <div class="bottle-info">
                            <p class="bottle-name">LAN RIOJA CRIANZA</p>
                            <p class="bottle-location">Rioja, Espagne</p>
                            <p class="bottle-year">2006</p>
                            <p class="bottle-grapes">Tempranillo</p>
                            <p class="bottle-description">Léger et rebondissant, avec un soupçon de truffe noire, ce vin ne manquera pas de titiller les papilles.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-content">
                        <div class="bottle">
                            <img src="assets/img/lurton.png" alt="lurton bouteille">
                        </div>
                        <div class="bottle-info">
                            <p class="bottle-name">BODEGA LURTON</p>
                            <p class="bottle-location-white">Mendoza, Argentina</p>
                            <p class="bottle-year">2011</p>
                            <p class="bottle-grapes-white">Pinot Gris</p>
                            <p class="bottle-description">De solides notes de cassis mêlées à une légère touche d'agrumes font de ce
                                un vin facile à boire pour des palais variés. Un nez charmeur et typé, digne d'un terroir exceptionnel.
                                terroir exceptionnel. Un vin blanc moderne et très savoureux.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-content">
                        <div class="bottle">
                            <img src="assets/img/bouscat.png" alt="bouscat bouteille">
                        </div>
                        <div class="bottle-info">
                            <p class="bottle-name">DOMAINE DU BOUSCAT</p>
                            <p class="bottle-location">Bordeaux, France</p>
                            <p class="bottle-year">2009</p>
                            <p class="bottle-grapes">Merlot</p>
                            <p class="bottle-description">La légère couleur dorée de ce vin dissimule la saveur vive qu'il renferme. Véritable vin d'été, il ne demande qu'à être dégusté lors d'un pique-nique dans un vignoble baigné de soleil.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
</main>

<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';
?>