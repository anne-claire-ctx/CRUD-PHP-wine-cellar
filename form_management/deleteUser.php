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
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('location: http://localhost/Nouveau-projet/users');
    }

    $sql = 'DELETE FROM `users` WHERE `id` = :id;';

    // On prépare la requête
    $query = $dbco->prepare($sql);

    // On "accroche" les paramètres
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();
    $_SESSION['message'] = "L'utilisateur a bien été supprimé";
    header('location: http://localhost/Nouveau-projet/users');
}else {
    $_SESSION['erreur'] = "Une erreur s'est produite";
    header('location: http://localhost/Nouveau-projet/users');
}