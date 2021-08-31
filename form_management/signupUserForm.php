<?php
require_once dirname(__DIR__) . 'datamanager/user-manager.php';
require_once __DIR__ . '/validation.php';

$fields_required = array($_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['confirmPassword']);

if (isset($_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['confirmPassword'])) {
    if (!in_array('', $fields_required)) {
        $pseudo = html($_POST['pseudo']);
        $password = html($_POST['password']);
        $passwordConfirm = html($_POST['confirmPassword']);
        $email = html($_POST['email']);
        $user = select_user($pseudo);
        if (!$user) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if ($_POST['password'] === $_POST['confirmPassword']) {
                    if(strlen($password) > 8) {
                        // on cripte et nettoie le mot de passe de possible espace
                        $pwh = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
                        createUser($pseudo, $email, $pwh);
                        header("location: ../login?msg=Le compte a bien été créé");
                    } else {
                        // on vérifie que le mot de passe est dans un format correct
                        header("location: ../signup?msg=Le mot de passe doit être au moins de 8 caractères");
                    }
                } else {
                    // on vérifie que les mots de passe sont indentiques
                    header("location: ../signup?msg=Les mots de passe doivent être identiques");
                }
            } else {
                // on vérifie que l'email est dans un format correct
                header("location: ../signup?msg=Le format de l'email n'est pas correct");
            }
        } else {
            // on vérifie que le pseudo n'existe pas déjà
            header("location: ../signup?msg=Ce pseudo est déjà utilisé, veuillez en choisir un autre");
        }
    } else {
        header("location: ../signup?msg=Veuillez remplir tous les champs");
    }
} else {
    header("location: ../signup?msg=données invalides");
}