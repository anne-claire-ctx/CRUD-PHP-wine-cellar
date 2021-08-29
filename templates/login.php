<?php
$nav = "login";
session_start();

// on appelle notre header et notre navbar
require_once __DIR__ . '/header.php';
// require_once __DIR__ . '/navbar.php';
?>

<section id="loginpage">

    <?php
    // Si nous avons un message d'erreur suivant une tentative de connexion infructueuse, on l'affiche ici :
    if (isset($_GET['msg'])) :
    ?>
        <div class="alert alert-light alert-dismissible fade show ms-3 me-3" role="alert">
            <?= $_GET['msg'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <!-- HTML -->
    <div class="container-fluid">
        <div class="row pt-4">
            <!-- Formulaire -->
            <form id="form" action="/" method="post" class="col-md-6">
                <h1 class="text-uppercase">Se connecter</h1>

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
                    <input type="text" name="pseudo" class="form-control" placeholder="Entrer votre pseudo :">
                </div>
                <div class="mb-4">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe :">
                </div>
                <div class="mb-4">
                    <input type="submit" value="Se connecter" class="btn me-2 login">
                    <a href="signin" class="btn btn-secondary sign">Pas encore de compte ? Pour en créer un c'est par ici</a>
                </div>
            </form>
        </div>
    </div>
</section>
<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';
