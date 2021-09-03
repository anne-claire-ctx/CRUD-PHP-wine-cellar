<?php
require_once dirname(__DIR__) . '/database/database.php';


// USERS

// fonction pour afficher tous les utilisateurs
function select_all_users()
{
    $dbco = NULL;
    connexion($dbco);

    try {
        $query = $dbco->prepare("SELECT * FROM users");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// fonction pour vérifier les utilisateurs
function select_user(string $pseudo)
{
    $dbco = NULL;
    connexion($dbco);

    try {
        $query = $dbco->prepare("SELECT id, pseudo, password, role FROM users WHERE pseudo=:pseudo");
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// fonction pour créer un nouvel utilisateur
function createUser(string $pseudo, string $password)
{
    $dbco = NULL;
    connexion($dbco);

    try {
        $query = $dbco->prepare("INSERT INTO users(pseudo, password, register_date)
    VALUES(:pseudo, :password, CURDATE())");
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
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


// WINES

// fonction pour afficher tous les vins
function select_all_wines()
{
    $dbco = NULL;
    connexion($dbco);

    try {
        $query = $dbco->prepare("SELECT * FROM wines");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// fonction pour sélectionner un vin par son id
function select_wine_by_id(int $id)
{
    $dbco = NULL;
    connexion($dbco);

    try {
        $query = $dbco->prepare("SELECT * FROM wines WHERE id=:id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// fonction pour supprimer un vin via son id
function delete_wine_by_id(int $id)
{
    $dbco = NULL;
    connexion($dbco);

    try {
        $query = $dbco->prepare("DELETE FROM wines WHERE id =:id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// fonction pour modifier un vin
function update_wine_by_id(array $data)
{
    $dbco = NULL;
    connexion($dbco);

    try {
        $query = $dbco->prepare("UPDATE wines SET name= :name, year= :year, bottle= :bottle, description= :description, region= :region, country= :country, grape= :grape WHERE id= :id");
        $query->bindValue(':name', $data['name'], PDO::PARAM_STR);
        $query->bindValue(':year', $data['year'], PDO::PARAM_INT);
        $query->bindValue(':bottle', $data['bottle'], PDO::PARAM_STR);
        $query->bindValue(':description', $data['description'], PDO::PARAM_STR);
        $query->bindValue(':region', $data['region'], PDO::PARAM_STR);
        $query->bindValue(':country', $data['country'], PDO::PARAM_STR);
        $query->bindValue(':grape', $data['grape'], PDO::PARAM_STR);
        $query->bindValue(':id', $data['id'], PDO::PARAM_INT);
        
        return $query->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// fonction pour ajouter un vin
function addwine(array $datas)
{
    $dbco = NULL;
    connexion($dbco);

    try {
    $query = $dbco->prepare(" 
		INSERT INTO wines(name, year, bottle, description, region, country, grape)
		VALUES(:name, :year, :bottle, :description, :region, :country, :grape);
	");
    $query->bindValue(':name', $datas['name'], PDO::PARAM_STR);
    $query->bindValue(':year', $datas['year'], PDO::PARAM_INT);
    $query->bindValue(':bottle', $datas['bottle'], PDO::PARAM_STR);
    $query->bindValue(':description', $datas['description'], PDO::PARAM_STR);
    $query->bindValue(':region', $datas['region'], PDO::PARAM_STR);
    $query->bindValue(':country', $datas['country'], PDO::PARAM_STR);
    $query->bindValue(':grape', $datas['grape'], PDO::PARAM_STR);

    return $query->execute();
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
}

// fonction pour ajouter un vin dans ma cave

function addwine_by_user($userid, $id)
{
    $dbco = NULL;
    connexion($dbco);

    try {
        $query = $dbco->prepare("
        INSERT INTO mywines(users_id, wines_id)
        VALUES(:users_id, :wines_id)");
        $query->bindValue(':users_id', $userid, PDO::PARAM_INT);
        $query->bindValue(':wines_id', $id, PDO::PARAM_INT);
        return $query->execute();
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// fonction pour afficher les vins par utilisateurs

function select_wine_by_user($userid)
{
    $dbco = NULL;
    connexion($dbco);

    try {
        $query = $dbco->prepare("
        SELECT * FROM wines LEFT JOIN mywines ON mywines.wines_id = wines.id WHERE users_id=:users_id");
        $query->bindValue(':users_id', $userid, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
}