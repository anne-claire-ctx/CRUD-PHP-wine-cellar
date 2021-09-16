<?php

// on appelle notre header
require_once __DIR__ . '/header.php';

//on vérifie que l'utilisateur est connecté pour accéder à cette page, sinon il est redirigé vers login.php
if (!isset($_SESSION['pseudo'])) {
    header("Location: http://localhost/mycave/login?msg=Vous devez être connecté pour accéder à cette page");
}
?>


<section id="lostpwd">
    <div class="tophead pwdc">
        <img src="assets/img/wine-bottle.png" alt="logo ouvre bouteille"><h2>Changer mon mdp</h2>
    </div>
    <?php
    // Si nous avons un message d'erreur suivant une tentative de changement de mot de passe infructueuse, on l'affiche ici :
    if (isset($_GET['msg'])) :
        ?>
            <div class="error" role="dialog">
                <p><?= $_GET['msg'] ?></p>
                <p class="exit"><span class="exitLeft"></span><span class="exitRight"></span></p>
            </div>
        <?php endif ?>

    <!-- HTML -->
    <div class="changepwd-page">
        <div class="form">
            <!-- Formulaire -->
            <form id="form" action="pwdChangeForm" method="post">
                    <input type="password" name="currentPassword" placeholder="Mot de passe actuel :">
                    
                    <input type="password" name="newPassword" placeholder="Nouveau mot de passe :">

                    <input type="password" name="confirmPassword" placeholder="Confirmez nouveau mot de passe :" required>

                    <button type="submit" class="btns">Mettre à jour mon mot de passe</button>
            </form>
        </div>
    </div>
    <div id="footer-push"></div>
</section>
<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';
