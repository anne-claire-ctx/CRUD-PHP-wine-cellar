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
    <div class="container">
        <div class="row">
            <!-- Formulaire -->
            <form id="form" action="loginForm" method="post">
                <div id="login-left">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_kdni2vdh.json" background="#000000" speed="1" style="height: 310px;" loop autoplay></lottie-player>
                </div>
                <div>
                <div>
                    <input type="text" name="pseudo" class="form-control" placeholder="Entrer votre pseudo :">
                </div>
                <div>
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe :">
                </div>
                <div>
                    <input type="submit" value="Se connecter" class="btns btnswhite">
                    <a href="signup" class="btns btnswhite">Pas encore de compte ? Pour en créer un c'est par ici</a>
                </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';
