<?php

// On appelle notre header ainsi que nos fonctions pour aller chercher les infos dans la base
require_once __DIR__ . '/header.php';
require_once dirname(__DIR__) . '/datamanager/data-manager.php';

if (!isset($_GET['id'])) {
    header("Location: http://localhost/Nouveau-projet/dashboard?msg=Aucun vin n'a été sélectionné");
}
// on appelle la fonction pour afficher les informations d'un vin
$wineId = select_wine_by_id($_GET['id']);
if (empty($wineId)) {
    header("Location: http://localhost/Nouveau-projet/dashboard?msg=Ce vin n'existe pas");
}
?>

<!-- HTML -->
<section id="product">
    <div class="tophead detail">
        <img src="assets/img/wine.png" alt="verre de vin"><h2>Détails</h2>
    </div>
    <div class="container">
        <div class="row">
            <div>
                <img src="<?= 'assets/img/' . $wineId['bottle'] ?>" alt="photo de la bouteille" class="mt-5">
            </div>
            <div>
                <h2><?= $wineId['name'] ?></h2>
                <ul>
                    <li>Description : <?= $wineId['description'] ?></li>
                    <li>Année : <?= $wineId['year'] ?></li>
                    <li>Cépage : <?= $wineId['grape'] ?></li>
                    <li>Région : <?= $wineId['region'] ?></li>
                    <li>Pays : <?= $wineId['country'] ?></li>
                    <li>Notre Avis : <?php if($wineId['grade'] == 3) : ?><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><?php elseif($wineId['grade'] == 4) : ?> <img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><?php elseif ($wineId['grade'] == 5) : ?> <img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><img src="./assets/img/star.png" alt="étoile"><?php endif;?></li>
                </ul>
                <a href="<?= $wineId['buy'] ?>" target="_blank">Acheter ce vin</a>
                <?php
                // on nettoie la précédente URL pour afficher les options en conséquence
                    $previous_url = $_SERVER['HTTP_REFERER'];
                    if(strpos($previous_url, '?') !== FALSE) {
                        $req_get 	= strrchr($previous_url, '?');
                        $previous_url 	= str_replace($req_get, '', $previous_url);
                    }
                // on affiche les options de modification dans le cas ou l'utilisateur est connecté
                if (!empty($_SESSION) && ($_SESSION['role'] == 1)) {
                    // on vérifie si l'utilisateur vient de sa page mywines ou de la liste des vins
                    if ($previous_url == 'http://localhost/Nouveau-projet/mywines') : ?>
                        <a href="deleteMyWine?id=<?= $wineId['id'] ?>" class="btn">Supprimer ce vin de ma cave personnelle</a>
                        <a href="mywines" class="btn">Retour vers ma cave à vin</a>
                    <?php else : ?>
                        <a href="addAWine?id=<?=$wineId['id'] ?>" class="btn"> Ajouter ce vin à ma cave</a>
                        <a href="update?id=<?= $wineId['id'] ?>" class="btn">Modifier ce vin</a>
                        <a href="deleteWine?id=<?= $wineId['id'] ?>" class="btn">Supprimer ce vin</a>
                        <a href="dashboard" class="btn">Retour à la liste des vins</a>
                    <?php endif;
                } elseif (!empty($_SESSION) && ($_SESSION['role'] == 0)) {
                    if ($previous_url == 'http://localhost/Nouveau-projet/mywines') : ?>
                        <a href="deleteMyWine?id=<?= $wineId['id'] ?>" class="btn">Supprimer ce vin de ma cave personnelle</a>
                        <a href="dashboard" class="btn">Retour à la liste des vins</a>
                    <?php else : ?>
                        <a href="addAWine?id=<?=$wineId['id'] ?>" class="btn"> Ajouter ce vin à ma cave</a>
                        <a href="dashboard" class="btn">Retour à la liste des vins</a>
                    <?php endif;
                } else { ?>
                    <a href="dashboard" class="btn">Retour à la liste des vins</a>
                <?php
                } ?>

            </div>
        </div>

    </div>
</section>
<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';
?>