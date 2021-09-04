<?php
require_once dirname(__DIR__) . '/datamanager/data-manager.php';
require_once __DIR__ . '/validation.php';

$fields_required = array($_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['confirmPassword']);

if (isset($_POST['pseudo'], $_POST['password'], $_POST['confirmPassword'])) {
    if (!in_array('', $fields_required)) {
        $pseudo = html($_POST['pseudo']);
        $password = html($_POST['password']);
        $email = html($_POST['email']);
        $passwordConfirm = html($_POST['confirmPassword']);
        $user = select_user($pseudo);
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if (!$user) {
                if ($password === $passwordConfirm) {
                    if(strlen($password) >= 8) {
                        // on cripte et nettoie le mot de passe de possible espace
                        $pwh = password_hash(($_POST['password']), PASSWORD_DEFAULT);
                        createUser($pseudo, $email, $pwh);
                        header("location: http://localhost/Nouveau-projet/login?msg=Le compte a bien été créé");
                    } else {
                        // on vérifie que le mot de passe est dans un format correct
                        header("location: http://localhost/Nouveau-projet/signup?msg=Le mot de passe doit être au moins de 8 caractères");
                    }
                } else {
                    // on vérifie que les mots de passe sont indentiques
                    header("location: http://localhost/Nouveau-projet/signup?msg=Les mots de passe doivent être identiques");
                }
            } else {
                // on vérifie que le pseudo n'existe pas déjà
                header("location: http://localhost/Nouveau-projet/signup?msg=Ce pseudo est déjà utilisé, veuillez en choisir un autre");
            }
        } else {
            header("location: http://localhost/Nouveau-projet/signup?msg=Le format de l'email n'est pas correct");
        }
    } else {
        header("location: http://localhost/Nouveau-projet/signup?msg=Veuillez remplir tous les champs");
    }
} else {
    header("location: http://localhost/Nouveau-projet/signup?msg=données invalides");
}