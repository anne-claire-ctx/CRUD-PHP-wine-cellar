<?php
require_once dirname(__DIR__) . '/database/database.php';

// fonction pour vérifier les utilisateurs
function select_user(string $pseudo)
{
    $dbco = NULL;
    connexion($dbco);

    try {
        $query = $dbco->prepare("SELECT pseudo, password, role FROM users WHERE pseudo=:pseudo");
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// fonction pour créer un nouvel utilisateur
function createUser(string $pseudo, string $email, string $password, string $role)
{
    $dbco = NULL;
    connexion($dbco);

    try {
        $query = $dbco->prepare("INSERT INTO users(pseudo, email, password, register_date)
    VALUES(:pseudo, :email, :password, CURDATE())");
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->bindValue(':email',$email, PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_STR);
        return $query->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// fonction pour mettre à jour le mot de passe
function update_pwd(string $pseudo, string $pwd){
    $dbco;

    connexion($dbco);

    try {
        $query = $dbco->prepare("UPDATE users 
        SET password=:password WHERE pseudo=:pseudo"); 
        $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
        $query->bindValue(':password',$pwd, PDO::PARAM_STR);
        return $query->execute();
    } catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
}