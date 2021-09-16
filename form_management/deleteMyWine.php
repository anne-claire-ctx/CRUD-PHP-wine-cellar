<?php
session_start();

// on appelle notre fonction pour récupérer un utilisateur et les infos de la db
require_once dirname(__DIR__) . '/datamanager/data-manager.php';


if ((isset($_GET['id'])) && ($_SESSION['id'])) {
    deletewine_by_user($_SESSION['id'], $_GET['id']);
    header("location: http://localhost/mycave/mywines?msg=Le vin a bien été supprimé de ma cave à vin");
} else {
    header("location: http://localhost/mycave/mywines?msg=Le vin n'a pas été supprimé de ma cave à vin suite à une erreur");
}
