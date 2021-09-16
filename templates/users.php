<?php

// variable pour la nav active
$nav = "users";

// On appelle notre header ainsi que nos fonctions pour aller chercher les infos dans la base
require_once dirname(__DIR__) . '/datamanager/data-manager.php';
require_once __DIR__ . '/header.php';
$users = select_all_users();

//on vérifie que l'utilisateur est connecté pour accéder à cette page, sinon il est redirigé vers login.php
if (!isset($_SESSION['pseudo'])) {
    header("Location: http://localhost/mycave/login?msg=Vous devez être connecté pour accéder à cette page");
} elseif (isset($_SESSION['pseudo']) && $_SESSION['role'] == 0) {
    header("Location: http://localhost/mycave/dashboard?msg=Vous devez être administrateur pour accéder à cette page");
}
?>

<!-- HTML -->
<section id="users">
    <div class="tophead usersh">
        <img src="assets/img/wine-bottle.png" alt="logo utilisateurs"><h2>Les utilisateurs</h2>
    </div>
    <div class="usertable">
    <?php
    // si message erreur a propos de l'utilisateur ou une validation
    if (isset($_GET['msg'])) :
        ?>
            <div class="error" role="dialog">
                <p><?= $_GET['msg'] ?></p>
                <p class="exit"><span class="exitLeft"></span><span class="exitRight"></span></p>
            </div>
    <?php endif ?>
        <table class="table-container users">
            <thead>
                <th><h1>ID</h1></th>
                <th><h1>PSEUDO</h1></th>
                <th><h1>EMAIL</h1></th>
                <th><h1>ROLE</h1></th>
                <th><h1>DATE D'INSCRIPTION</h1></th>
                <th colspan="2"><h1>ACTIONS</h1></th>
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
                    <?php if($user['id'] !== $_SESSION['id']) : ?>
                    <td><a href="editUser?id=<?=$user['id']?>"><img src="assets/img/edituser.png" title="modifier le role de l'utilisateur" alt="icone modifier utilisateur"></a></td>
                    <td><a href="deleteUser?id=<?=$user['id']?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer cet utilisateur ?');"><img src="assets/img/delete-user.png" title="supprimer l'utilisateur" alt="icone supprimer utilisateur"></a></td><?php endif;?>
                </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
        <div class="tablecomment">
            <p class="message">Role 1 = Administrateur</p>
            <p class="message">Role 0 = Utilisateur</p>
        </div>
    </div>
    <div id="footer-push"></div>
</section>
<?php
require_once __DIR__ . '/footer.php';