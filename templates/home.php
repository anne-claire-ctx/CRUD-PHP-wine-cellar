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
            <video muted autoplay loop width="100%" poster="assets/img/red.jpg">
                <source src="assets/video/wine-small.mp4">
                <source src="assets/video/wine-small.ogv">
                <source src="assets/video/wine-small.webm">
            </video>
            <h2>“Si le vin manque,<br/>il manque tout ”<br/><span>Proverbe Latin</span></h2>
        </div>
        
        <div id="myvideo">
            <video muted autoplay loop width="90%" poster="assets/img/poster.jpg">
                <source src="assets/video/wine.mp4" type="video/mp4">
                <source src="assets/video/wine.ogv" type="video/ogv">
                <source src="assets/video/wine.webm" type="video/webm">
                Veuillez mettre à jour votre navigateur.
            </video>
            <h2>“Si le vin manque, il manque tout ”<br/><span>Proverbe Latin</span></h2>
        </div>
    </header>
    <section class="introduction">
        <div class="icones">
            <div class="introduction-left">
                <img src="assets/img/wine-barrel.png" alt="logo tonneaux">
                <p>Consulter notre sélection des meilleurs vins à travers le monde. Suivant leur devise avec conviction, nos deux fondateurs, oenologues par passion, vous présentent leurs pépites.</p>
            </div>
            <div class="introduction-center">
                <img src="assets/img/my-wines.png" alt="logo mon verre">
                <p>Constituer votre cave personnalisée avec l'aide de nos conseils experts et laissez votre goût s'exprimer pour le plaisir simple d'un bon verre de vin !</p>
            </div>
            <div class="introduction-right">
                <img src="assets/img/worldwide.png" alt="logo monde">
                <p>Trouver où acheter nos merveilles dans toutes les boutiques à proximité de chez vous et pour le meilleur prix !</p>
            </div>
        </div>
    </section>
    <section class="slider">
        <div class="swiper">
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
        </div>
        <div id="btnsswiper">
            <a href="dashboard" class="btns btnshome">Découvrir notre sélection</a>
        </div>
    </section>
</main>

<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';
?>