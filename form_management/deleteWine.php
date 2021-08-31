<?php
session_start();

// on appelle notre fonction pour récupérer un utilisateur et les infos de la db
require_once __DIR__ . '/datamanger/wine-manager.php';
require_once __DIR__ . '/datamanager/user-manager.php';
if(isset($_SESSION['pseudo'])){
    $user = select_user($_SESSION['pseudo']);
}

if ((isset($_GET['id'])) && $_SESSION['pseudo'] && $user['role'] == 1) {
    delete_wine_by_id($_GET['id']);
    header("location: ../dashboard?msg=Le vin a bien été supprimé");
} else {
    header("location: ../dashboard?msg=Le vin n'a pas été supprimé suite à une erreur ou parce que vous n'avez pas les droits pour cette action");
}
