<?php
session_start();

// on appelle notre fonction pour récupérer un contact et les infos de la db
require_once dirname(__DIR__) . '/datamanager/data-manager.php';


if ((isset($_GET['id'])) && ($_SESSION['role'] == 1)) {
    delete_contact_by_id($_GET['id']);
    header("location: http://localhost/Nouveau-projet/contactemail?msg=Le message a bien été supprimé de la liste");
} else {
    header("location: http://localhost/Nouveau-projet/contactemail?msg=Le message n'a pas été supprimé suite à une erreur");
}