<?php

// Connexion à la base de données

function connexion(&$conn)
{
    $servername = 'localhost';
    $dbname = 'id17545786_mycave	';
    $username = 'id17545786_accx';
    $dbpwd = 'T9C0v!jd/R+D~T1w';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $dbpwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        echo "Erreur:" . $e->getMessage();
        die();
    }
}
