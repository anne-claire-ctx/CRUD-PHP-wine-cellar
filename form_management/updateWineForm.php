<?php
// on appelle notre fichier pour récupérer les infos dans la base de données
require_once dirname(__DIR__) . '/datamanager/data-manager.php';

// on appelle notre fichier pour valider les données
require_once __DIR__ . 'validation.php';

// on récupère l'id du produit concerné
$id = $_GET['id'];

// On re-spécifie qu'on est en UTF-8
mb_internal_encoding("UTF-8");

// on fait un tableau pour les champs obligatoires
$fields_required = array($_POST['name'], $_POST['year'], $_POST['description'], $_POST['region'], $_POST['country'], $_POST['grape']);

// on initialise la variable set_request (vérifier les données avant de les insérer dans la base)
$set_request = FALSE;

// on vérifie que des données ont été envoyées
if (isset($fields_required)) :
    // on vérifie que les champs nécessaires sont remplis
    if (in_array('', $fields_required)) :
        header("location: http://localhost/Nouveau-projet/update?id=$id&msg=Merci de remplir tous les champs");
    else :
        // on nettoie les données
        $name = html(strtoupper($_POST['name']));
        $year = html($_POST['year']);
        $description = html(mb_ucfirst($_POST['description']));
        $region = html(mb_ucfirst($_POST['region']));
        $country = html(mb_ucfirst($_POST['country']));
        $grape = html(mb_ucfirst($_POST['grape']));

        $picture = $_FILES['picture'];
        $ext = array('png', 'jpg', 'jpeg');

        // on gère les erreurs pour le fichier image
        if ($picture['error'] > 0 && $picture['error'] < 3) :
            $msg_error = "la taille du fichier est trop grande";
        elseif ($picture['error'] == 3 || $picture['error'] > 4) :
            $msg_error = "problème pendant le chargement du fichier";
        else :
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
                    $msg_error = "le fichier n'est pas une image";
                }
                // taille ok, extension ok
                else {

                    // je donne un nouveau nom à l'image pour éviter les doublons
                    $picture_name = uniqid() . '_' . $picture['name'];
                    $img_folder = dirname(dirname(__DIR__)) . '/mycavefinal/assets/img/';
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
    header("Location: http://localhost/Nouveau-projet/update?id=$id&msg=$msg_error");
} elseif ($set_request) {
    $data = array(
        'id' => $id,
        'name' => $name,
        'year' => $year,
        'bottle' => $picture_name,
        'description' => $description,
        'region' => $region,
        'country' => $country,
        'grape' => $grape,
    );
    $result = update_wine_by_id($data);
    header("Location: http://localhost/Nouveau-projet/product?id=$id&msg=Le vin a bien été modifié");
} else {
    header("Location: http://localhost/Nouveau-projet/product?id=$id&msg=Une erreur s'est produite");
}
