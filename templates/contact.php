<?php
// on appelle notre header
require_once __DIR__ . '/header.php';

if (isset($_SESSION['email'])) {
    $sessionEmail = $_SESSION['email'];
} else {
    $sessionEmail = "";
}
?>

<section id="contactpage">
<div class="tophead cont">
        <img src="assets/img/contact.png" alt="logo contact"><h2>Nous contacter</h2>
    </div>
    <div class="container">
        <h2>Formulaire de contact</h2>
            <form action="contactForm" method="post">
                <label for="name">Nom & prénom</label>
                <input type="text" id="name" name="name" placeholder="Votre nom et prénom">

                <label for="subject">Sujet</label>
                <input type="text" id="subject" name="subject" placeholder="L'objet de votre message">

                <label for="emailAddress">Email</label>
                <input id="emailAddress" type="email" name="email" placeholder="Votre email" value="<?= $sessionEmail ?>">

                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Votre message" style="height:200px"></textarea>

                <input type="submit" value="Envoyer">
            </form>
            <?php
                // Si nous avons un message d'erreur suivant une tentative d'ajout infructueuse d'un vin, on l'affiche ici :
                if (isset($_GET['msg'])) :
                ?>
                    <div class="alert alert-light alert-dismissible fade show ms-3 me-3" role="alert">
                        <?= $_GET['msg'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php endif ?>
            <div id="reseaux">
                <p>Suivez nous sur les réseaux sociaux pour plus de conseils :</p>
                <div id="icon-rs">
                    <a href="#"><img src="assets/img/facebook.png" id="icon-1" alt="icone facebook" onmouseover="mouseIn(1)" onmouseout="mouseOut(1)"></a>
                    <a href="#"><img src="assets/img/twitter.png" id="icon-2" alt="icone twitter" onmouseover="mouseIn(2)" onmouseout="mouseOut(2)"></a>
                    <a href="#"><img src="assets/img/instagram.png" id="icon-3" alt="icone instagram" onmouseover="mouseIn(3)" onmouseout="mouseOut(3)"></a>
                </div>
            </div>
            <div id="footer-push"></div>
    </div>
</section>
<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';