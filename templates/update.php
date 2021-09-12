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
    <div class="tophead editw">
        <img src="assets/img/edit.png" alt="logo modifier un vin"><h2>Modifier un vin</h2>
    </div>
    <?php
    // Si nous avons un message d'erreur suivant une tentative de mise à jour infructueuse, on l'affiche ici :
    if (isset($_GET['msg'])) :
        ?>
            <div class="error" role="dialog">
                <p><?= $_GET['msg'] ?></p>
                <p class="exit"><span class="exitLeft"></span><span class="exitRight"></span></p>
            </div>
    <?php endif ?>
    <div class="editwinepage">
        <div class="editwine">
            <div class="form">
                <!-- formulaire -->
                <form action="updateWineForm?id=<?= $id ?>" method="post" enctype="multipart/form-data"><!-- enctype pour gérer les $_FILES -->
                    <label for="name">Modifier le nom :</label>
                    <input type="text" id="name" name="name" value="<?php echo $wine['name']; ?>" required>

                    <label for="year">Modifier le millésime :</label>
                    <input type="number" id="year" name="year" value="<?php echo $wine['year']; ?>" required>
                    
                    <label for="description">Modifier la description :</label>
                    <input type="textarea" id="description" name="description" value="<?php echo $wine['description']; ?>" required></input>
                    
                    <label for="region">Modifier la région :</label>
                    <input type="text" id="region" name="region" value="<?php echo $wine['region']; ?>" required>
                    
                    <label for="grape">Modifier le cépage :</label>
                    <input type="text" id="grape" name="grape" value="<?php echo $wine['grape']; ?>" required>
                    
                    <label for="country">Modifier le pays :</label>
                    <input type="text" id="country" name="country" value="<?php echo $wine['country']; ?>" required>
                    

                    <label for="color">Modifier la couleur :</label>
                    <p class="message">Rouge, Rosé, Blanc</p>
                    <input type="text" id="color" name="color" value="<?php echo $wine['color']; ?>" required>
                    
                    <label for="grade">Modifier la note :</label>
                    <input type="number" id="grade" name="grade" value="<?php echo $wine['grade']; ?>" required>
                    
                    <label for="buy">Modifier la lien :</label>
                    <p class="message">Remplir le nom du vin et remplacer les espaces par des <span>"+"</span>. Exemple : https://www.google.com/search?q=chateau+de+saint+cosme</p>
                    <input type="text" id="buy" name="buy" value="<?php echo $wine['buy']; ?>" required>
                    
                    <label for="picture">Modifier la photo :</label>
                    <p class="message">Formats acceptés : png, jpg, jpeg. </p>
                    <p class="message">Taille max : 4 Mo </p>
                    <input type="hidden" name="MAX_FILE_SIZE" value="4194304"> <!-- Gérer la taille max du fichier img : 4Mo => 1024*1024*4 -->
                    <input type="file" id="picture" name="new-picture">
                     
                    <button type="submit" class="btns btnswhite">Modifier ce vin</button>
                </form>
            </div>
            <div class="updatewineright">
                <div class="updateImg">
                    <img src="<?= './assets/img/' . $wine['bottle'] ?>" alt="photo de la bouteille">
                </div>
                <input type="hidden" name="picture" value="<?= $wine['bottle'] ?>"> 
                <input type="hidden" name="id" value="<?= $wine['id'] ?>">
                <div class="options">
                    <a href="product?id=<?= $id ?>" class="btns btnswhite">Retour à la fiche du vin</a>
                    <a href="dashboard" class="btns btnswhite">Retour à la liste des vins</a>
                </div>
            </div>
        </div>
    </div>
    <div id="footer-push"></div>
</section>
<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';
