<?php

// on appelle les fichiers nécessaire pour le login
require_once dirname(__DIR__) . '/datamanager/data-manager.php';
require_once __DIR__ . '/validation.php';


if (isset($_POST['pseudo'], $_POST['password'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
        $pseudo = html($_POST['pseudo']);
        $password = html($_POST['password']);
        $user = select_user($pseudo);
        if ($user) {
            if(password_verify($password, $user[0]['password'])) {
            session_start();
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['role'] = $user[0]['role'];
            $_SESSION['id'] = $user[0]['id'];
            $_SESSION['email'] = $user[0]['email'];
            $_SESSION['register_date'] = $user[0]['register_date'];
            header("location: http://localhost/mycave/dashboard?msg=Bienvenue $pseudo !");
            } else {
            header("location: http://localhost/mycave/login?msg=Identifiants incorrects");
            }
        } else {
            header("location: http://localhost/mycave/login?msg=ce pseudo n'existe pas");
        }
    } else {
        header("location: http://localhost/mycave/login?msg=Il manque des informations");
    }
} else {
    header("location: http://localhost/mycave/login?msg=Données invalides");
}
