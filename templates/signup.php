<?php
// on appelle notre header
require_once __DIR__ . '/header.php';
?>

<!-- HTML -->
<section id="register">
    <div class="tophead signup">
        <img src="assets/img/signup.png" alt="logo cheers"><h2>Créer un compte</h2>
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
    <div class="signup-page">
        <img src="assets/img/logo-blanc.png" alt="logo mycave">
        <div class="form">
            <form action="signupUserForm" method="post" id="registerform">
                <input type="text" name="pseudo" placeholder="Entrer votre pseudo :" required>
                <input type="email" name="email" placeholder="Entrer votre email :" required>
                <input type="password" name="password" placeholder="Mot de passe :" required>
                <input type="password" name="confirmPassword" placeholder="Confirmez votre mot de passe :" required>
                <button type="submit" class="btns">Créer un compte</button>
                <p class="message">Déjà un compte ? <a href="login">Se connecter</a></p>
            </form>
        </div>
    </div>
    <div id="footer-push"></div>
</section>
<?php
// on appelle notre footer
require_once __DIR__ . '/footer.php';
