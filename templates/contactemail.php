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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>DATE/HEURE</th>
                            <th>NOM</th>
                            <th>EMAIL</th>
                            <th>SUBJECT</th>
                            <th>MESSAGE</th>
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
                        </tr>
                        <?php
                        endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require_once __DIR__ . '/footer.php';