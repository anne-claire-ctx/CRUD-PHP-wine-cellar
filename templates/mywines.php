<?php

// variable pour la nav active
$nav= "mywines";

// On appelle notre header ainsi que nos fonctions pour aller chercher les infos dans la base
require_once dirname(__DIR__) . '/datamanager/data-manager.php';
require_once __DIR__ . '/header.php';

//on vérifie que l'utilisateur est connecté pour accéder à cette page, sinon il est redirigé vers login.php
if (!isset($_SESSION['pseudo'])) {
    header("Location: http://localhost/Nouveau-projet/login?msg=Vous devez être connecté pour accéder à cette page");
}

$userid = $_SESSION['id'];
$wines = select_wine_by_user($userid);
$user = select_user($_SESSION['pseudo']);

?>

<!-- HTML -->
<section id="mywines">
    <div class="tophead mine">
        <img src="assets/img/my-wines.png" alt="logo ma cave"><h2>Ma Cave à vin</h2>
    </div>

    <div id="infocard">
        <h3>Mes informations personnelles</h3>
        <div id="info-content">
            <div id="info-left">
                <p>Pseudo : <?php echo $_SESSION['pseudo']; ?></p>
                <p id="pmail">Email : <?php echo $_SESSION['email']; ?></p>
            </div>
            <div id="info-right">
                <p>Date d'inscription : <?php echo $_SESSION['register_date']; ?></p>
                <a href="pwdchange" class="btns btnswhite">Changer mon mot de passe</a>
            </div>
        </div>
    </div>

    <?php
    // Si nous avons un message d'erreur suivant une tentative de modification ou suppression infructueuse d'un vin, on l'affiche ici :
        if (isset($_GET['msg'])) :
            ?>
                <div class="error" role="dialog">
                    <p><?= $_GET['msg'] ?></p>
                    <p class="exit"><span class="exitLeft"></span><span class="exitRight"></span></p>
                </div>
            <?php endif ?>

    <div class="container">
        <div class="grid">
            <?php
            if (empty($wines)) : ?>
            <p>Votre cave à vin est vide pour le moment. Cliquez <a href="dashboard">ici</a> pour la remplir.</p>
            <?php endif;
            // boucle afin d'afficher tous nos vins en cartes
            foreach($wines as $wine) : ?>
                <div class="card">
                    <div class="card__head">
                        <?php if ($wine['bottle']) : ?>
                            <img src="<?= './assets/img/' . $wine['bottle'] ?>" alt="photo de la bouteille">
                        <?php else : ?>
                            <img src="./assets/img/generic.png" alt="photo de la bouteille">
                        <?php endif; ?>
                    </div>
                    <div class="card__body">
                        <a href="product?id=<?= $wine['id'] ?>" class="link">
                            <h5><?= $wine['name'] ?></h5>
                        </a>
                        <p class="card-text <?php if ($wine['color'] == "Rouge") : ?> red <?php else : ?> white <?php endif; ?>"><?= $wine['region'] ?>, <?= $wine['country'] ?></p>
                        <p class="card-text"><?= $wine['year'] ?></p>
                        <p class="card-text<?php if ($wine['color'] == "Rouge") : ?> red <?php else : ?> white <?php endif; ?>"><?= $wine['grape'] ?></p>
                        <p class="card-text">Notre avis : <?php if($wine['grade'] == 3) : ?><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><?php elseif($wine['grade'] == 4) : ?> <img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><?php elseif ($wine['grade'] == 5) : ?> <img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><?php endif;?></p>
                        <a href="product?id=<?= $wine['id'] ?>" class="btns <?php if ($wine['color'] == "Rouge") : ?>btnsred<?php else : ?> btnsww<?php endif; ?>">Plus d'informations</a>
                    </div>
                </div>
            <?php endforeach; ?>           
        </div>
        <div id="footer-push"></div>
</section>

<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';
