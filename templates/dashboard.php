<?php

// variable pour la nav active
$nav = "dashboard";

// On appelle notre header ainsi que nos fonctions pour aller chercher les infos dans la base
require_once dirname(__DIR__) . '/datamanager/data-manager.php';
require_once dirname(__DIR__) . '/form_management/searchForm.php';
require_once __DIR__ . '/header.php';

?>

<!-- HTML -->
<section id="dashboard">
    <h2>Nos vins</h2>

    <?php
    // Si nous avons un message d'erreur suivant une tentative de modification ou suppression infructueuse d'un vin, on l'affiche ici :
    if (isset($_GET['msg'])) :
    ?>
        <div class="alert alert-light alert-dismissible fade show ms-3 me-3" role="alert">
            <?= $_GET['msg'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="grid">
            <form method="post"> 
                <p><input type="text" name="search" placeholder="Rechercher"></p>
                <input type="submit" value="Rechercher"> 
            </form>
            <form method="get">
                <select name="sort" id="sort">
                    <option value="" disabled <?php if (!isset($_GET['sort'])) : ?> selected <?php endif; ?> <?php if ((isset($_GET['sort'])) && ($_GET['sort'] == 'reset')) : ?> selected <?php endif; ?>>Trier par...</option>
                    <option value="region" <?php if ((isset($_GET['sort'])) && ($_GET['sort'] == 'region')) : ?> selected <?php endif; ?>>Régions</option>
                    <option value="country" <?php if ((isset($_GET['sort'])) && ($_GET['sort'] == 'country')) : ?> selected <?php endif; ?>>Pays</option>
                    <option value="year" <?php if ((isset($_GET['sort'])) && ($_GET['sort'] == 'year')) : ?> selected <?php endif; ?>>Années</option>
                    <option value="grape" <?php if ((isset($_GET['sort'])) && ($_GET['sort'] == 'grape')) : ?> selected <?php endif; ?>>Cépages</option>
                    <option value="name" <?php if ((isset($_GET['sort'])) && ($_GET['sort'] == 'name')) : ?> selected <?php endif; ?>>Noms</option>
                    <option value="reset">Réinitialiser</option>
                </select>
                <button type="submit">Trier</button>
            </form>
            <?php
            if (isset($_POST['search']) && empty($wines)) : ?>
                <p>Aucun vin trouvé</p><a href="dashboard" class="btn">Retour à la liste complète des vins</a>
                <?php endif;
            if (isset($_POST['search']) && !empty($wines)) : ?>
            <a href="dashboard" class="btn">Retour à la liste complète des vins</a>
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
                        <p class="card-text"><?= $wine['region'] ?>, <?= $wine['country'] ?></p>
                        <p class="card-text"><?= $wine['year'] ?></p>
                        <p class="card-text"><?= $wine['grape'] ?></p>
                        <a href="product?id=<?= $wine['id'] ?>" class="btn">Plus d'informations</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
</section>

<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';
