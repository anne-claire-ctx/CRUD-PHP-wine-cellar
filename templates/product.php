<?php

// On appelle notre header ainsi que nos fonctions pour aller chercher les infos dans la base
require_once __DIR__ . '/header.php';
require_once dirname(__DIR__) . '/datamanager/data-manager.php';

// on appelle notre fonction pour récupérer un utilisateur
if(isset($_SESSION['pseudo'])){
    $user = select_user($_SESSION['pseudo']);
}


// Si l'utilisateur est connecté, on appelle la navbar correspondante
// if (!isset($_SESSION['pseudo'])) {
//     require_once __DIR__ . '/templates/navbar.php';
// } elseif (!isset($_GET['id'])) {
//     header("location: http://localhost/Nouveau-projet/dashboard?msg=Veuillez sélectionner un produit");
// } elseif (isset($_SESSION['pseudo']) && $user['role'] == 0) {
//     require_once __DIR__ . '/templates/navbaruser.php';
// } else {
//     require_once __DIR__ . '/templates/navbaradmin.php';
// }

// on appelle la fonction pour afficher les informations d'un vin
$wineId = select_wine_by_id($_GET['id']);

?>

<!-- HTML -->
<section id="product">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center mt-1 mb-3">
                <img src="<?= 'assets/img/' . $wineId['bottle'] ?>" alt="photo de la bouteille" class="mt-5">
            </div>
            <div class="col-md-6">
                <h2 class="m-4"><?= $wineId['name'] ?></h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item mb-3 p-4">Description : <?= $wineId['description'] ?></li>
                    <li class="list-group-item mb-3 p-4">Année : <?= $wineId['year'] ?></li>
                    <li class="list-group-item mb-3 p-4">Cépage : <?= $wineId['grape'] ?></li>
                    <li class="list-group-item mb-3 p-4">Région : <?= $wineId['region'] ?></li>
                    <li class="list-group-item mb-3 p-4">Pays : <?= $wineId['country'] ?></li>
                </ul>

                <?php
                // on affiche les options de modification dans le cas ou l'utilisateur est connecté
                if (!empty($_SESSION) && ($_SESSION['role'] == 1)) { ?>
                    <a href="mywines?id=<?=$wineId['id'] ?>" class="btn"> Ajouter ce vin à ma cave</a>
                    <a href="update?id=<?= $wineId['id'] ?>" class="btn">Modifier ce vin</a>
                    <a href="deleteWine?id=<?= $wineId['id'] ?>" class="btn">Supprimer ce vin</a>
                    <a href="dashboard" class="btn">Retour à la liste des vins</a>
                <?php } elseif (!empty($_SESSION) && ($_SESSION['role'] == 0)) { ?>
                    <a href="mywines?id=<?=$wineId['id'] ?>" class="btn"> Ajouter ce vin à ma cave</a>
                    <a href="dashboard" class="btn">Retour à la liste des vins</a>
                <?php } else { ?>
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