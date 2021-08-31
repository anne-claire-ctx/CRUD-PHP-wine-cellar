<?php

// on appelle les fichiers nécessaire pour le login
require_once dirname(__DIR__) . '/datamanager/user-manager.php';
require_once __DIR__ . '/validation.php';


if (isset($_POST['pseudo'], $_POST['password'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
        $pseudo = html($_POST['pseudo']);
        $user = select_user($pseudo);
        if (($user['pseudo'] === $pseudo) && (password_verify(($_POST['password']), $user['password']))) {
            session_start();
            $_SESSION['pseudo'] = $_POST['pseudo'];
            header("location: ../dashboard.php?msg=Bienvenue $pseudo !");
        } else {
            header("location: ../login.php?msg=Identifiants incorrects");
        }
    } else {
        header("location: ../login.php?msg=Il manque des informations");
    }
} else {
    header("location: ../login.php?msg=Données invalides");
}
