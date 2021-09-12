<?php
$nav = "login";

// on appelle notre header
require_once __DIR__ . '/header.php';
?>

<section id="loginpage">
    <div class="tophead logi">        
        <img src="assets/img/wine-bottle.png" alt="logo ouvre bouteille"><h2>Se connecter</h2>
    </div>
    <?php
    // Si nous avons un message d'erreur suivant une tentative de connexion infructueuse, on l'affiche ici :
    if (isset($_GET['msg'])) :
    ?>
        <div class="error" role="dialog">
            <p><?= $_GET['msg'] ?></p>
            <p class="exit"><span class="exitLeft"></span><span class="exitRight"></span></p>
        </div>
    <?php endif;
    // on vérifie que l'utilisateur n'est pas déjà connecté
    if (isset($_SESSION['pseudo'])) :
        ?>
    <div class="error" role="dialog">
            <p><?= "Vous êtes déjà connecté" ?></p>
            <p class="exit"><span class="exitLeft"></span><span class="exitRight"></span></p>
    </div>
    <?php
    endif; ?>

    <!-- HTML -->

    <div class="login-page">
        <img src="assets/img/logo-blanc.png" alt="logo mycave">
        <div class="form">
            <form action="loginForm" method="post" id="loginform">
                <input type="text" name="pseudo" placeholder="Entrer votre pseudo :" required>
                <input type="password" name="password" placeholder="Mot de passe :" required>
                <button type="submit" class="btns">Se connecter</button>
                <p class="message">Pas encore de compte ? <a href="signup">Créer un compte</a></p>
            </form>
        </div>
    </div>
    <div id="footer-push"></div>
</section>
<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';
