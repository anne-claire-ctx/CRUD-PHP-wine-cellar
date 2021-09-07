<?php

// variable pour la nav active
$nav = "users";

// On appelle notre header ainsi que nos fonctions pour aller chercher les infos dans la base
require_once dirname(__DIR__) . '/datamanager/data-manager.php';
require_once __DIR__ . '/header.php';
$users = select_all_users();

//on vérifie que l'utilisateur est connecté pour accéder à cette page, sinon il est redirigé vers login.php
if (!isset($_SESSION['pseudo'])) {
    header("Location: http://localhost/Nouveau-projet/login?msg=Vous devez être connecté pour accéder à cette page");
} elseif (isset($_SESSION['pseudo']) && $_SESSION['role'] == 0) {
    header("Location: http://localhost/Nouveau-projet/dashboard?msg=Vous devez être administrateur pour accéder à cette page");
}
?>

<!-- HTML -->
<section id="users">
<div class="tophead usersh">
        <img src="assets/img/wine-bottle.png" alt="logo utilisateurs"><h2>Les utilisateurs</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">

                <?php
                // si message erreur a propos de l'utilisateur ou une validation
                if (!empty($_SESSION['message'])) : ?>
                    <div class="alert alert-light alert-dismissible fade show ms-3 me-3" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>PSEUDO</th>
                            <th>EMAIL</th>
                            <th>ROLE</th>
                            <th>DATE D'INSCRIPTION</th>
                        </thead>
                        <tbody>
                        <?php
                        // On boucle sur la variable result
                        foreach ($users as $user) :
                        ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['pseudo'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['role'] ?></td>
                            <td><?= $user['register_date']?></td>
                            <td><a class="links" href="editUser?id=<?=$user['id']?>">Modifier le role</a>
                                <a class="links ms-4" href="deleteUser?id=<?=$user['id']?>">Supprimer l'utilisateur</a></td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
                <p>Role 1 = Administrateur</p>
                <p>Role 0 = Utilisateur</p>
            </div>
        </div>
    </div>
</section>
<?php
require_once __DIR__ . '/footer.php';