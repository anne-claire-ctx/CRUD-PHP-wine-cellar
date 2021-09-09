<?php

// variable pour la nav active
$nav = "addwine";

// on appelle notre header
require_once __DIR__ . '/header.php';

//on vérifie que l'utilisateur est connecté pour accéder à cette page, sinon il est redirigé vers login.php
if (!isset($_SESSION['pseudo'])) {
    header("Location: http://localhost/Nouveau-projet/login?msg=Vous devez être connecté pour accéder à cette page");
} elseif (isset($_SESSION['pseudo']) && $_SESSION['role'] == 0) {
    header("Location: http://localhost/Nouveau-projet/dashboard?msg=Vous devez être administrateur pour accéder à cette page");
}

?>

<!-- HTML -->
<section id="addwine">
    <div class="tophead addw">
        <img src="assets/img/wine-menu.png" alt="logo ajouter un vin"><h2>Ajouter un vin</h2>
    </div>
    <div class="container">
        <div class="row">
            <div>
                <?php
                // Si nous avons un message d'erreur suivant une tentative d'ajout infructueuse d'un vin, on l'affiche ici :
                if (isset($_GET['msg'])) :
                ?>
                    <div class="alert alert-light alert-dismissible fade show ms-3 me-3" role="alert">
                        <?= $_GET['msg'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>

                <!-- Formulaire -->
                <form action="addWineForm" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="name">Nom du vin :</label><input type="text" class="form-control" id="name" name="name" placeholder="Indiquez le nom du vin" required>
                    </div>
                    <div> <label for="year">Année du vin :</label><input type="number" class="form-control" id="year" name="year" placeholder="Indiquez l'année du vin" required>
                    </div>
                    <div>
                        <label for="description ">Description :</label><textarea class="form-control" id="description " name="description" placeholder="Description" required></textarea>
                    </div>
                    <div>
                        <label for="region">Région :</label><input type="text" class="form-control" id="region" name="region" placeholder="Indiquez la région du vin" required>
                    </div>
                    <div>
                        <label for="grape">Cépage :</label><input type="text" class="form-control" id="grape" name="grape" placeholder="Indiquez le cépage du vin" required>
                    </div>
                    <div>
                        <label for="country">Pays : </label><input type="text" class="form-control" id="country" name="country" placeholder="Indiquez le pays du vin" required>
                    </div>
                    <div>
                        <label for="color">Couleur : </label><input type="text" class="form-control" id="color" name="color" placeholder="Indiquez la couleur du vin - Rouge - Rosé - Blanc" required>
                    </div>
                    <div>
                        <label for="grade">Note /5 : </label><input type="number" class="form-control" id="grade" name="grade" placeholder="Indiquez le note du vin" required>
                    </div>
                    <div>
                        <label for="buy">Lien pour acheter : </label><input type="text" class="form-control" id="buy" name="buy" value="https://www.google.com/search?q=" required>
                        <p>Remplir le nom du vin et remplacer les espaces par des "+". Exemple : https://www.google.com/search?q=chateau+de+saint+cosme</p>
                    </div>
                    <div><label for="picture">Photo de la bouteille :</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="4194304"> <!-- 4Mo => 1024*1024*4 -->
                        <input type="file" class="form-control" id="picture" name="picture" placeholder="Ajouter l'image de la bouteille">
                        <p>Formats acceptés : png, jpg, jpeg. </p>
                        <p>Taille max : 4 Mo </p>
                    </div>
                    <div>
                        <button type="submit" class="btn login">Ajouter un vin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';
