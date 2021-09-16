<?php
require_once dirname(__DIR__) . '/datamanager/data-manager.php';
require_once __DIR__ . '/validation.php';

session_start();
$fields_required = array($_POST['currentPassword'], $_POST['newPassword'], $_POST['confirmPassword']);



if (isset($_POST['currentPassword'], $_POST['newPassword'], $_POST['confirmPassword'])) {
    if (!in_array('', $fields_required)) {
        $pseudo = $_SESSION['pseudo'];
        $currentPwd = html($_POST['currentPassword']);
        $newPwd = html($_POST['newPassword']);
        $confirmPwd = html($_POST['confirmPassword']);
        $user = select_user($pseudo);
        if (password_verify($currentPwd, $user[0]['password'])) {
            if ($newPwd === $confirmPwd) {
                if(strlen($newPwd) >= 8) {
                    $newPwd = password_hash($newPwd, PASSWORD_DEFAULT);
                    $updatePwd = update_pwd($pseudo, $newPwd);
                    header("location: http://localhost/mycave/mywines?msg=Votre mot de passe a bien été mis à jour");
                } else {
                    header("location: http://localhost/mycave/pwdchange?msg=Le mot de passe doit être au moins de 8 caractères");
                }
            } else {
                header("location: http://localhost/mycave/pwdchange?msg=Les nouveaux mots de passe ne correspondent pas");
            }
        } else {
            header("location: http://localhost/mycave/pwdchange?msg=Votre mot de passe actuel est incorrect");
        }
    } else {
        header("location: http://localhost/mycave/pwdchange?msg=Veuillez remplir tous les champs");
    }
} else {
    header("location: http://localhost/mycave/pwdchange?msg=données invalides");
}