<?php
session_start();
// on appelle notre fichier pour récupérer les infos dans la base de données (fonctions avec requêtes SQL)
require_once dirname(__DIR__) . '/datamanager/data-manager.php';

$user = select_user($_SESSION['pseudo']);
$userid = $_SESSION['id'];
$id = $_GET['id'];


if ((isset($_GET['id'])) && (!empty($_SESSION))) {
    addwine_by_user($userid, $id);
    header("location: http://localhost/mycave/mywines?msg=Le vin a bien été ajouté");
} else {
    header("location: http://localhost/mycave/mywines?msg=Le vin n'a pas été ajouté suite à une erreur ou parce que vous n'avez pas les droits pour cette action");
}
