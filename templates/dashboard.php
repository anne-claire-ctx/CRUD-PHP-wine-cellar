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
    <div class="tophead dash">
        <img src="assets/img/winery.png" alt="logo nos vins"><h2>Nos vins</h2>
    </div>

    <?php
    // Si nous avons un message d'erreur suivant une tentative de suppression infructueuse d'un vin, on l'affiche ici :
    if (isset($_GET['msg'])) :
        ?>
            <div class="error" role="dialog">
                <p><?= $_GET['msg'] ?></p>
                <p class="exit"><span class="exitLeft"></span><span class="exitRight"></span></p>
            </div>
        <?php endif ?>

    <div class="searchbar">
        <form method="post" class="search-option"> 
            <input type="search" name="search" placeholder="Rechercher" required>
            <button type="submit"><img src="assets/img/search.png" alt="icone recherche"></i></button>
        </form>
        <form method="get" class="sort-option">
            <select name="sort" id="sort">
                <option value="" disabled <?php if (!isset($_GET['sort'])) : ?> selected <?php endif; ?> <?php if ((isset($_GET['sort'])) && ($_GET['sort'] == 'reset')) : ?> selected <?php endif; ?>>Trier par...</option>
                <option value="region" <?php if ((isset($_GET['sort'])) && ($_GET['sort'] == 'region')) : ?> selected <?php endif; ?>>Régions</option>
                <option value="country" <?php if ((isset($_GET['sort'])) && ($_GET['sort'] == 'country')) : ?> selected <?php endif; ?>>Pays</option>
                <option value="year" <?php if ((isset($_GET['sort'])) && ($_GET['sort'] == 'year')) : ?> selected <?php endif; ?>>Années</option>
                <option value="grape" <?php if ((isset($_GET['sort'])) && ($_GET['sort'] == 'grape')) : ?> selected <?php endif; ?>>Cépages</option>
                <option value="name" <?php if ((isset($_GET['sort'])) && ($_GET['sort'] == 'name')) : ?> selected <?php endif; ?>>Noms</option>
                <option value="color" <?php if ((isset($_GET['sort'])) && ($_GET['sort'] == 'color')) : ?> selected <?php endif; ?>>Couleur</option>
                <option value="grade" <?php if ((isset($_GET['sort'])) && ($_GET['sort'] == 'grade')) : ?> selected <?php endif; ?>>Notes</option>
                <option value="reset">Réinitialiser</option>
            </select>
            <button type="submit"><img src="assets/img/sorting.png" alt="icone tri"></button>
        </form>
            <?php
        if (isset($_POST['search']) && empty($wines) && ($_POST['search'] !== "")): ?>
            <p>Aucun vin trouvé</p><a href="dashboard" class="btns btnswhite">Retour à la liste complète des vins</a>
        <?php endif;
        if (isset($_POST['search']) && !empty($wines) && ($_POST['search'] !== "")): ?>
            <a href="dashboard" class="btns btnswhite">Retour à la liste complète des vins</a>
        <?php endif; ?>
    </div>
    <div class="container">
        <div class="grid">
            <?php // boucle afin d'afficher tous nos vins en cartes
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
                        <p class="card-text" id="lastp">Notre avis : <?php if($wine['grade'] == 3) : ?><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><?php elseif($wine['grade'] == 4) : ?> <img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><?php elseif ($wine['grade'] == 5) : ?> <img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><?php endif;?></p>
                        <a href="product?id=<?= $wine['id'] ?>" class="button <?php if ($wine['color'] == "Rouge") : ?>btnsred<?php else : ?>btnsww<?php endif; ?>">En savoir plus</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div id="footer-push"></div>
</section>

<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';
