<?php

// on appelle notre header
require_once __DIR__ . '/header.php';

//on vérifie que l'utilisateur est connecté pour accéder à cette page, sinon il est redirigé vers login.php
if (!isset($_SESSION['pseudo'])) {
    header("Location: http://localhost/Nouveau-projet/login?msg=Vous devez être connecté pour accéder à cette page");
}
?>


<section id="lostpwd">
    <div class="tophead pwdc">
        <img src="assets/img/wine-bottle.png" alt="logo ouvre bouteille"><h2>Changer mon mot de passe</h2>
    </div>
    <?php
    // Si nous avons un message d'erreur suivant une tentative de changement de mot de passe infructueuse, on l'affiche ici :
    if (isset($_GET['msg'])) :
    ?>
        <div class="alert alert-light alert-dismissible fade show ms-3 me-3" role="alert">
            <?= $_GET['msg'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <!-- HTML -->
    <div class="container">
        <div class="row">
            <!-- Formulaire -->
            <form id="form" action="pwdChangeForm" method="post">
                <h1 class="text-uppercase">Mettre à jour son mot de passe</h1>

                <div>
                    <input type="password" name="currentPassword" class="form-control" placeholder="Entrer votre mot de passe actuel :">
                </div>
                <div>
                    <input type="password" name="newPassword" class="form-control" placeholder="Entrer votre nouveau mot de passe :">
                </div>
                <div>
                    <input type="password" name="confirmPassword" class="form-control" placeholder="Confirmez votre nouveau mot de passe :" required>
                </div>
                <div>
                    <input type="submit" value="Changer de mot de passe" class="btn login">
                </div>
            </form>
        </div>
    </div>
</section>
<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';
