<?php
// on débute la session
session_start();

// variable pour la nav active
$nav = "updatewine";

// on appelle notre header
require_once __DIR__ . '/header.php';

// on appelle notre fonction pour récupérer un utilisateur
require_once dirname(__DIR__) . '/datamanager/user-manager.php';
// $user = select_user($_SESSION['pseudo']);


// on vérifie que l'utilisateur est connecté pour accéder à cette page, sinon il est redirigé vers login.php
// if (!isset($_SESSION['pseudo'])) {
//     header("Location: login?msg=Vous devez être connecté pour accéder à cette page");
// } elseif (isset($_SESSION['pseudo']) && $user['role'] == 0) {
//     header("Location: dashboard?msg=Vous devez être administrateur pour accéder à cette page");
// } else {
//     require_once __DIR__ . '/templates/navbaradmin.php';
// }

// on récupère l'id du produit
$id = intval($_GET['id']);

// on récupère les infos du produit dans la base
require_once dirname(__DIR__) . '/datamanager/wine-manager.php';
$wine = select_wine_by_id($id);
?>

<!-- HTML -->
<section id="updatewine">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Modifier ce vin</h2>
                <?php
                // Si nous avons un message d'erreur suivant une tentative de modification d'un vin, on l'affiche ici :
                if (isset($_GET['msg'])) :
                ?>
                    <div class="alert alert-light alert-dismissible fade show ms-3 me-3" role="alert">
                        <?= $_GET['msg'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>

                <!-- formulaire -->
                <form action="data/updateForm.php?id=<?= $id ?>" method="post" enctype="multipart/form-data"><!-- enctype pour gérer les $_FILES -->
                    <div class="mb-3">
                        <label for="name">Modifier le nom du vin :</label><input type="text" class="form-control" id="name" name="name" value="<?php echo $wine['name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="year">Modifier l'année du vin :</label><input type="number" class="form-control" id="year" name="year" value="<?php echo $wine['year']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description">Modifier la description :</label><input type="textarea" class="form-control pt-2 pb-3" id="description" name="description" value="<?php echo $wine['description']; ?>" required></input>
                    </div>
                    <div class="mb-3">
                        <label for="region">Modifier la région :</label><input type="text" class="form-control" id="region" name="region" value="<?php echo $wine['region']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="grape">Modifier le cépage :</label><input type="text" class="form-control" id="grape" name="grape" value="<?php echo $wine['grape']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="country">Modifier le pays :</label><input type="text" class="form-control" id="country" name="country" value="<?php echo $wine['country']; ?>" required>
                    </div>
                    <div class="mb-3"><label for="picture">Modifier la photo de la bouteille :</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="4194304"> <!-- Gérer la taille max du fichier img : 4Mo => 1024*1024*4 -->
                        <input type="file" class="form-control" id="picture" name="picture" value="<?php echo $wine['bottle']; ?>">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn login me-1 mt-1">Modifier ce vin</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 mt-3 mb-3 ps-3 updateImg">
                <img src="<?= './assets/img/' . $wine['bottle'] ?>" alt="photo de la bouteille">
            </div>
            <div class="row">
                <div class="col-md-12 text-end">
                    <a href="product?id=<?= $id ?>" class="btn login me-2 ms-2 mt-2">Retour à la fiche du vin</a>
                    <a href="dashboard" class="btn login me-2 ms-2 mt-2">Retour à la liste des vins</a>
                </div>
            </div>

        </div>
    </div>
</section>
<?php
// on appelle le footer
require_once __DIR__ . '/templates/footer.php';
