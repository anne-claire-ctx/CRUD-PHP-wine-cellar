<?php
// on appelle notre header
require_once __DIR__ . '/header.php';
?>

<!-- HTML -->
<section id="register">

    <?php
    // Si nous avons un message d'erreur suivant une tentative de création de compte infructueuse, on l'affiche ici :
    if (isset($_GET['msg'])) :
    ?>
        <div class="alert alert-light alert-dismissible fade show ms-3 me-3" role="alert">
            <?= $_GET['msg'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <div class="container-fluid">
        <div class="row pt-4">
            <!-- Formulaire -->
            <form id="form" action="signupUserForm" method="post" class="col-md-6">
                <h1 class="text-uppercase">Créer un compte</h1>

                <?php
                // on vérifie que l'utilisateur n'est pas déjà connecté
                if (isset($_SESSION['pseudo'])) :
                ?>
                    <div class="alert alert-light alert-dismissible fade show ms-3 me-3" role="alert">
                        <?= "Vous êtes déjà connecté" ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                endif; ?>

                <div class="mb-4">
                    <input type="text" name="pseudo" class="form-control" placeholder="Entrer votre pseudo :" required>
                </div>
                <div class="mb-4">
                    <input type="email" name="email" class="form-control" placeholder="Entrer votre email :" required>
                </div>
                <div class="mb-4">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe :" required>
                </div>
                <div class="mb-4">
                    <input type="password" name="confirmPassword" class="form-control" placeholder="Confirmez votre mot de passe :" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn login">Créer un compte</button>
                    <a href="login" class="btn btn-secondary sign">Déjà un compte ? Se connecter</a>
                </div>
            </form>
        </div>
    </div>
</section>
<?php
// on appelle notre footer
require_once __DIR__ . '/footer.php';
