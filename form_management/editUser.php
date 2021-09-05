<?php
// On démarre une session
session_start();


// Est ce que l'ID existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once dirname(__DIR__) . '/datamanager/data-manager.php';
    $dbco = NULL;
    connexion($dbco);

    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `users` WHERE `id` = :id;';

    // On prépare la requête
    $query = $dbco->prepare($sql);

    // On accroche les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On execute la requete
    $query->execute();

    // On récupère le user
    $user = $query->fetch();

    // On vérifie si le user existe
    if(!$user){
        $_SESSION['message'] = "Cet id n'existe pas";
        header('location: http://localhost/Nouveau-projet/users');
    }
    $admin = ($user['role'] == 0) ? 1 : 0 ;

    $sql = 'UPDATE `users` SET `role`=:role WHERE `id` = :id;';

    // On prépare la requête
    $query = $dbco->prepare($sql);

    // On "accroche" les paramètres
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->bindValue(':role', $admin, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();
    $_SESSION['message'] = "L'utilisateur est a bien changé de role";
    header('location: http://localhost/Nouveau-projet/users');
}else {
    $_SESSION['message'] = "URL invalide";
    header('location: http://localhost/Nouveau-projet/users');
}
