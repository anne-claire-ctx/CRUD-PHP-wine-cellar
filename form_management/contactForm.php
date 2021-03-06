<?php
session_start();
// on appelle notre fichier pour récupérer les infos dans la base de données (fonctions avec requêtes SQL)
require_once dirname(__DIR__) . '/datamanager/data-manager.php';

// on appelle notre fichier pour valider les données (fonction pour nettoyer les données reçues dans le formulaire - espaces et balise html)
require_once __DIR__ . '/validation.php';

// On re-spécifie qu'on est en UTF-8
mb_internal_encoding("UTF-8");

// on fait un tableau pour les champs obligatoires
$fields_required = array($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message']);

// on initialise la variable set_request (vérifier les données avant de les insérer dans la base)
$set_request = FALSE;

// on récupère l'id de l'utilisateur si celui-ci est connecté
if (isset($_SESSION['id'])) {
    $id_users = $_SESSION['id'];
} else {
    $id_users = NULL;
}

// on vérifie que des données ont été envoyées
if (isset($fields_required)) :
    // on vérifie que les champs nécessaires sont remplis
    if (in_array('', $fields_required)) :
        header("Location: http://localhost/mycave/contact?msg=Merci de remplir tous les champs");
    else :
        // on nettoie les données
        $name = html(ucwords($_POST['name']));
        $email = html(strtolower($_POST['email']));
        $subject = html($_POST['subject']);
        $message = html($_POST['message']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) :
            header("Location: http://localhost/mycave/contact?msg=Votre email est incorrect");
        else :
        $set_request = TRUE;
        endif;
    endif;
else : $msg_error = "Données invalides";
endif;

// si on a un message d'erreur, on l'affiche. Sinon, on lance la requete
if (isset($msg_error)) {
    header("Location: http://localhost/mycave/contact?msg=$msg_error");
} elseif ($set_request) {
    $contactDatas = array(
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message,
        'id_users' => $id_users
    );
    $result = send_contact($contactDatas);
    header("Location: http://localhost/mycave/contact?msg=Votre message a bien été envoyé");
} else {
    header("Location: http://localhost/mycave/contact?msg=Une erreur s'est produite. Merci de réessayer.");
}
