<?php
// on appelle notre fichier de fonction Requêtes SQL
require_once dirname(__DIR__) . '/datamanager/data-manager.php';
// on appelle notre fichier pour nettoyer les données
require_once __DIR__ . '/validation.php';
// on fait un tableau pour les champs obligatoires
$fields_required = array($_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['confirmPassword']);

// on vérifie qu'on reçoit des informations
if (isset($_POST['pseudo'], $_POST['password'], $_POST['confirmPassword'])) {
    // on vérifie que toutes les informations nécessaire à l'inscription sont présentes
    if (!in_array('', $fields_required)) {
        // on nettoie les informations reçues
        $pseudo = html(strtolower($_POST['pseudo']));
        $password = html($_POST['password']);
        $email = html($_POST['email']);
        $passwordConfirm = html($_POST['confirmPassword']);
        // on appelle nos requêtes SQL
        $user = select_user($pseudo);
        $emailu = select_user_by_email($email);
        // on vérifie le format de l'email
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            // on vérifie que le pseudo n'existe pas déjà
            if (!$user) {
                // on vérifie que l'email n'existe pas déjà
                if (!$emailu) {
                    // on vérifie que les mots de passe correspondent
                    if ($password === $passwordConfirm) {
                        // on vérifie que le mot de passe fait bien au minimum 8 caractères
                        if(strlen($password) >= 8) {
                            // on crypte et nettoie le mot de passe de possible espaces
                            $pwh = password_hash(($_POST['password']), PASSWORD_DEFAULT);
                            // on ajoute le compte à la bdd
                            createUser($pseudo, $email, $pwh);
                            // on redirige vers la page de connexion
                            header("location: http://localhost/mycave/login?msg=Le compte a bien été créé");
                        } else {
                            header("location: http://localhost/mycave/signup?msg=Le mot de passe doit être au moins de 8 caractères");
                        }
                    } else {
                        header("location: http://localhost/mycave/signup?msg=Les mots de passe doivent être identiques");
                    }
                } else {
                    header("location: http://localhost/mycave/signup?msg=Cet email est déjà utilisé, veuillez en choisir un autre");
                }
            } else {
                header("location: http://localhost/mycave/signup?msg=Ce pseudo est déjà utilisé, veuillez en choisir un autre");
            }
        } else {
            header("location: http://localhost/mycave/signup?msg=Le format de l'email n'est pas correct");
        }
    } else {
        header("location: http://localhost/mycave/signup?msg=Veuillez remplir tous les champs");
    }
} else {
    header("location: http://localhost/mycave/signup?msg=données invalides");
}