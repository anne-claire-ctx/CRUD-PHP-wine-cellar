<?php

// on appelle notre header
require_once __DIR__ . '/header.php';

// on appelle notre fonction pour récupérer un vin
require_once dirname(__DIR__) . '/datamanager/data-manager.php';

//on vérifie que l'utilisateur est connecté pour accéder à cette page, sinon il est redirigé vers login.php
if (!isset($_SESSION['pseudo'])) {
    header("Location: http://localhost/Nouveau-projet/login?msg=Vous devez être connecté pour accéder à cette page");
} elseif (isset($_SESSION['pseudo']) && $_SESSION['role'] == 0) {
    header("Location: http://localhost/Nouveau-projet/dashboard?msg=Vous devez être administrateur pour accéder à cette page");
}

if(empty($_GET['id'])) header('location:http://localhost/Nouveau-projet/dashboard?msg=Aucune bouteille selectionnée');

// on récupère l'id du produit
$id = intval($_GET['id']);

// on récupère les infos du produit dans la base
$wine = select_wine_by_id($id);
?>

<!-- HTML -->
<section id="updatewine">
    <div class="container">
        <div class="row">
            <div>
                <h2>Modifier ce vin</h2>
                <?php
                // Si nous avons un message d'erreur suivant une tentative de mise à jour infructueuse, on l'affiche ici :
                if (isset($_GET['msg'])) :
                    ?>
                        <div class="error" role="dialog">
                            <p><?= $_GET['msg'] ?></p>
                            <p class="exit"><span class="exitLeft"></span><span class="exitRight"></span></p>
                        </div>
                    <?php endif ?>

                <!-- formulaire -->
                <form action="updateWineForm?id=<?= $id ?>" method="post" enctype="multipart/form-data"><!-- enctype pour gérer les $_FILES -->
                <div>
                    <div>
                        <label for="name">Modifier le nom du vin :</label><input type="text" class="form-control" id="name" name="name" value="<?php echo $wine['name']; ?>" required>
                    </div>
                    <div>
                        <label for="year">Modifier l'année du vin :</label><input type="number" class="form-control" id="year" name="year" value="<?php echo $wine['year']; ?>" required>
                    </div>
                    <div>
                        <label for="description">Modifier la description :</label><input type="textarea" class="form-control pt-2 pb-3" id="description" name="description" value="<?php echo $wine['description']; ?>" required></input>
                    </div>
                    <div>
                        <label for="region">Modifier la région :</label><input type="text" class="form-control" id="region" name="region" value="<?php echo $wine['region']; ?>" required>
                    </div>
                    <div>
                        <label for="grape">Modifier le cépage :</label><input type="text" class="form-control" id="grape" name="grape" value="<?php echo $wine['grape']; ?>" required>
                    </div>
                    <div>
                        <label for="country">Modifier le pays :</label><input type="text" class="form-control" id="country" name="country" value="<?php echo $wine['country']; ?>" required>
                    </div>
                    <div>
                        <label for="color">Modifier la couleur :</label><input type="text" class="form-control" id="color" name="color" value="<?php echo $wine['color']; ?>" required>
                    </div>
                    <div>
                        <label for="grade">Modifier la note /5 :</label><input type="number" class="form-control" id="grade" name="grade" value="<?php echo $wine['grade']; ?>" required>
                    </div>
                    <div>
                        <label for="buy">Modifier le lien pour acheter :</label><input type="text" class="form-control" id="buy" name="buy" value="<?php echo $wine['buy']; ?>" required>
                        <p>Remplir le nom du vin et remplacer les espaces par des "+". Exemple : https://www.google.com/search?q=chateau+de+saint+cosme</p>
                    </div>
                </div>
                <div>
                    <div><label for="picture">Modifier la photo de la bouteille :</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="4194304"> <!-- Gérer la taille max du fichier img : 4Mo => 1024*1024*4 -->
                        <input type="file" class="form-control" id="picture" name="new-picture">
                        <p>Formats acceptés : png, jpg, jpeg. </p>
                        <p>Taille max : 4 Mo </p>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btns btnswhite">Modifier ce vin</button>
                    </div>
                </form>
            </div>
            <div class="updateImg">
                <img src="<?= './assets/img/' . $wine['bottle'] ?>" alt="photo de la bouteille">
            </div>
            <input type="hidden" name="picture" value="<?= $wine['bottle'] ?>"> 
            <input type="hidden" name="id" value="<?= $wine['id'] ?>">
            <div class="row">
                <div>
                    <a href="product?id=<?= $id ?>" class="btns btnswhite">Retour à la fiche du vin</a>
                    <a href="dashboard" class="btns btnswhite">Retour à la liste des vins</a>
                </div>
            </div>

        </div>
    </div>
</section>
<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';
