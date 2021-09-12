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
    <?php
                // Si nous avons un message d'erreur suivant une tentative de contact, on l'affiche ici :
            if (isset($_GET['msg'])) :
                ?>
            <div class="error" role="dialog">
                <p><?= $_GET['msg'] ?></p>
                <p class="exit"><span class="exitLeft"></span><span class="exitRight"></span></p>
            </div>
            <?php endif ?>
    <div class="contact-page">
        <img src="assets/img/logo-blanc.png" alt="logo mycave"> 
        <div class="form">
            <form action="contactForm" method="post">
                <input type="text" id="name" name="name" placeholder="Votre nom et prénom" required>
                <input type="text" id="subject" name="subject" placeholder="L'objet de votre message" required>
                <input id="emailAddress" type="email" name="email" placeholder="Votre email" required value="<?= $sessionEmail ?>">
                <textarea id="message" name="message" placeholder="Votre message" style="height:200px"></textarea>
                <button type="submit" class="btns">Envoyer</button>
            </form>
        </div>
        <div id="footer-push"></div>
    </div>
</section>
<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';