<?php

// variable pour la nav active
$nav= "mywines";

// On appelle notre header ainsi que nos fonctions pour aller chercher les infos dans la base
require_once dirname(__DIR__) . '/datamanager/data-manager.php';
require_once __DIR__ . '/header.php';

$userid = $_SESSION['id'];
$wines = select_wine_by_user($userid);

?>

<!-- HTML -->
<section id="dashboard">
    <h2>Mes vins</h2>

    <?php
    // Si nous avons un message d'erreur suivant une tentative de modification ou suppression infructueuse d'un vin, on l'affiche ici :
    if (isset($_GET['msg'])) :
    ?>
        <div class="alert alert-light alert-dismissible fade show ms-3 me-3" role="alert">
            <?= $_GET['msg'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <div class="container">
        <div class="grid">
            <?php
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
                        <p class="card-text"><?= $wine['description'] ?></p>
                        <a href="product?id=<?= $wine['id'] ?>" class="btn">Plus d'informations</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
</section>

<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';
