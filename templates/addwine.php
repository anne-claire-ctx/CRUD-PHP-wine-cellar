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
    <?php
                // Si nous avons un message d'erreur suivant une tentative d'ajout infructueuse d'un vin, on l'affiche ici :
                if (isset($_GET['msg'])) :
                ?>
                <div class="error" role="dialog">
                    <p><?= $_GET['msg'] ?></p>
                    <p class="exit"><span class="exitLeft"></span><span class="exitRight"></span></p>
                </div>
                <?php endif ?>
    <div class="addwinepage">
        <div class="form">   
            <!-- Formulaire -->
            <form action="addWineForm" method="post" enctype="multipart/form-data">
                    <input type="text" id="name" name="name" placeholder="Indiquez le nom du vin" required>

                    <input type="number" id="year" name="year" placeholder="Indiquez l'année du vin" required>

                    <textarea id="description " name="description" placeholder="Description" required></textarea>

                    <input type="text" id="region" name="region" placeholder="Indiquez la région du vin" required>

                    <input type="text" id="grape" name="grape" placeholder="Indiquez le cépage du vin" required>

                    <input type="text" id="country" name="country" placeholder="Indiquez le pays du vin" required>
 
                    <p class="message">Rouge, Rosé, Blanc</p>
                    <input type="text" id="color" name="color" placeholder="Indiquez la couleur du vin" required>
                    
                    <input type="number" id="grade" name="grade" placeholder="Indiquez le note du vin / 5" required>

                    <p class="message">Remplir le nom du vin et remplacer les espaces par des <span>"+"</span>. Exemple : https://www.google.com/search?q=chateau+de+saint+cosme</p>
                    <input type="text" id="buy" name="buy" value="https://www.google.com/search?q=" required>
                    
                    <p class="message">Formats acceptés : png, jpg, jpeg. </p>
                    <p class="message">Taille max : 4 Mo </p>
                    <input type="hidden" name="MAX_FILE_SIZE" value="4194304"> <!-- 4Mo => 1024*1024*4 -->
                    <input type="file" id="picture" name="picture" placeholder="Ajouter l'image de la bouteille">
                    
                    <button type="submit" class="btns">Ajouter un vin</button>
            </form>
        </div>
    </div>
    <div id="footer-push"></div>
</section>

<?php
// on appelle le footer
require_once __DIR__ . '/footer.php';
