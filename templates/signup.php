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

    <div class="container">
        <div class="row">
            <!-- Formulaire -->
            <form id="form" action="signupUserForm" method="post">
                <h1 class="text-uppercase">Créer un compte</h1>
                <div>
                    <input type="text" name="pseudo" class="form-control" placeholder="Entrer votre pseudo :" required>
                </div>
                <div>
                    <input type="email" name="email" class="form-control" placeholder="Entrer votre email :" required>
                </div>
                <div>
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe :" required>
                </div>
                <div>
                    <input type="password" name="confirmPassword" class="form-control" placeholder="Confirmez votre mot de passe :" required>
                </div>
                <div>
                    <button type="submit" class="btns btnswhite">Créer un compte</button>
                    <a href="login" class="btns btnswhite">Déjà un compte ? Se connecter</a>
                </div>
            </form>
        </div>
    </div>
</section>
<?php
// on appelle notre footer
require_once __DIR__ . '/footer.php';
