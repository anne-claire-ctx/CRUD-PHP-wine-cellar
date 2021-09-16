<?php
// on appelle notre fichier pour récupérer les infos dans la base de données (fonctions avec requêtes SQL)
require_once dirname(__DIR__) . '/datamanager/data-manager.php';

// on appelle notre fichier pour valider les données (fonction pour nettoyer les données reçues dans le formulaire - espaces et balise html)
require_once __DIR__ . '/validation.php';

// On re-spécifie qu'on est en UTF-8
mb_internal_encoding("UTF-8");

// on fait un tableau pour les champs obligatoires
if ($_POST) {$fields_required = array($_POST['name'], $_POST['year'], $_POST['description'], $_POST['region'], $_POST['country'], $_POST['grape'], $_POST['color'], $_POST['grade'], $_POST['buy']);}

// on initialise la variable set_request (vérifier les données avant de les insérer dans la base - si set_request est true, alors on peut y aller)
$set_request = FALSE;

// on vérifie que des données ont été envoyées
if (isset($fields_required)) :
    // on vérifie que les champs nécessaires sont remplis
    if (in_array('', $fields_required)) :
        $msg_error = "Merci de remplir tous les champs";
    else :
        // on nettoie les données
        $name = html(strtoupper($_POST['name']));
        $year = html($_POST['year']);
        $description = html(mb_ucfirst($_POST['description']));
        $region = html(mb_ucfirst($_POST['region']));
        $country = html(mb_ucfirst($_POST['country']));
        $grape = html(mb_ucfirst($_POST['grape']));
        $color = html(mb_ucfirst($_POST['color']));
        $grade = html($_POST['grade']);
        $buy = html(strtolower($_POST['buy']));

        // on récupère dans la variable $picture le fichier de l'image
        $picture = $_FILES['picture'];
        // on fait un tableau pour préciser les formats d'image acceptés
        $ext = array('png', 'jpg', 'jpeg');

        // on gère les erreurs pour le fichier image
        if ($picture['error'] > 0 && $picture['error'] < 3) :
            $msg_error = "la taille du fichier est trop grande";
        elseif ($picture['error'] == 3 || $picture['error'] > 4) :
            $msg_error = "problème pendant le chargement du fichier";
        else :
            // erreur 4 = aucun fichier n'a été téléchargé donc on lui donne le nom de l'image générique
            if ($picture['error'] == 4) :
                $picture_name = 'generic.png';
                $set_request = TRUE;
            else :
                // je revérifie la taille de l'image côté serveur
                if ($picture['size'] > 4194304) {
                    $msg_error = "la taille du fichier est trop grande"; // 4Mo => 1024*1024*4
                }
                // je vérifie que l'extension est bien une image
                elseif (!in_array(strtolower(pathinfo($picture['name'], PATHINFO_EXTENSION)), $ext)) {
                    $msg_error = "le format de l'image n'est pas accepté";
                }
                // taille ok, extension ok
                else {
                    // je donne un nouveau nom à l'image pour éviter les doublons
                    $picture_name = uniqid() . '_' . $picture['name'];
                    // je donne à $img_folder l'emplacement final du fichier
                    $img_folder = dirname(__DIR__) . '/assets/img/';
                    // je lui dis de créer le fameux fichier s'il n'existe pas
                    @mkdir($img_folder, 0777);
                    $dir = $img_folder . $picture_name;

                    // on déplace le fichier dans le bon endroit
                    $move_file = @move_uploaded_file($picture['tmp_name'], $dir);

                    if (!$move_file) {
                        $msg_error = "problème pendant le chargement du fichier";
                    } else {
                        $set_request = TRUE;
                    }
                }
            endif;
        endif;
    endif;
else : $msg_error = "Données invalides";
endif;

// si on a un message d'erreur, on l'affiche. Sinon, on lance la requete
if (isset($msg_error)) {
    header("Location: http://localhost/Nouveau-projet/addwine?msg=$msg_error");
} elseif ($set_request) {
    $datas = array(
        'name' => $name,
        'year' => $year,
        'bottle' => $picture_name,
        'description' => $description,
        'region' => $region,
        'country' => $country,
        'grape' => $grape,
        'color' => $color,
        'grade' => $grade,
        'buy' => $buy
    );
    // j'appelle ma fonction pour rentrer les données dans la base
    $result = addwine($datas);
    header("Location: http://localhost/Nouveau-projet/dashboard?msg=Le vin a bien été ajouté à la base de données");
} else {
    header("Location: http://localhost/Nouveau-projet/dashboard?msg=Une erreur s'est produite");
}
