<?php

// variable pour la nav active
$nav = "mails";

// On appelle notre header ainsi que nos fonctions pour aller chercher les infos dans la base
require_once dirname(__DIR__) . '/datamanager/data-manager.php';
require_once __DIR__ . '/header.php';
$mails = select_all_emails();

//on vérifie que l'utilisateur est connecté pour accéder à cette page, sinon il est redirigé vers login.php
if (!isset($_SESSION['pseudo'])) {
    header("Location: http://localhost/Nouveau-projet/login?msg=Vous devez être connecté pour accéder à cette page");
} elseif (isset($_SESSION['pseudo']) && $_SESSION['role'] == 0) {
    header("Location: http://localhost/Nouveau-projet/dashboard?msg=Vous devez être administrateur pour accéder à cette page");
}
?>

<!-- HTML -->
<section id="contact-email">
    <div class="tophead emai">
        <img src="assets/img/contact.png" alt="logo contact"><h2>Mails reçus</h2>
    </div>
    <div class="emailtable">
    <?php
    // si message erreur a propos de l'utilisateur ou une validation
    if (isset($_GET['msg'])) :
        ?>
            <div class="error" role="dialog">
                <p><?= $_GET['msg'] ?></p>
                <p class="exit"><span class="exitLeft"></span><span class="exitRight"></span></p>
            </div>
    <?php endif ?>
        <table class="table-container">
            <thead>
                <th><h1>DATE/HEURE</h1></th>
                <th><h1>NOM</h1></th>
                <th><h1>EMAIL</h1></th>
                <th><h1>SUBJECT</h1></th>
                <th><h1>MESSAGE</h1></th>
                <th><h1>ACTION</h1></th>
            </thead>
            <tbody>
            <?php
            // On boucle sur la variable result
            foreach ($mails as $mail) :
            ?>
            <tr>
                <td><?= $mail['datetime'] ?></td>
                <td><?= $mail['name'] ?></td>
                <td><?= $mail['email'] ?></td>
                <td><?= $mail['subject'] ?></td>
                <td><?= $mail['message']?></td>
                <td><a href="deleteContact?id=<?=$mail['idcontact']?>"><img src="assets/img/delete-user.png" title="supprimer le message" alt="icone supprimer message"></a></td>
            </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
    </div>
    <div id="footer-push"></div>
</section>
<?php
require_once __DIR__ . '/footer.php';