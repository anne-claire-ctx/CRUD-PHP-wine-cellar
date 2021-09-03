<?php

// Connexion à la base de données

function connexion(&$conn)
{
    $servername = 'localhost';
    $dbname = 'id16434975_mycave';
    $username = 'id16434975_accx';
    $dbpwd = '%poHJ\31&ph!X^=1';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $dbpwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        echo "Erreur:" . $e->getMessage();
        die();
    }
}
